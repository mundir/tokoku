<?php

namespace App\Controllers;

class Keranjang extends BaseController
{
    public function index()
    {
        $idCustomer = $this->session->get('id');
        $keranjangModel = new \App\Models\Keranjang_m();
        $dtKeranjang = $keranjangModel
            ->select('keranjang.*,barang.nama_barang, barang.harga, barang.harga, barang.stok, barang.gambar')
            ->join('barang', 'keranjang.id_barang=barang.id')
            ->where('id_customer', $idCustomer)
            ->get()->getResult();
        $data = [
            'judulPage' => "Keranjang Belanja",
            'jumlahKeranjang' => count($dtKeranjang),
            'dtKeranjang' => $dtKeranjang,
        ];
        $data = array_merge($data, $this->data);


        return view('keranjang_v', $data);
    }

    public function proses()
    {
        $customerModel = new \App\Models\Pengguna_m();
        $cust = $customerModel->find($idCustomer = $this->session->get('id'));
        $barangModel = new \App\Models\Barang_m();
        $post = $this->request->getPost();

        $indexCbk = $post['cbk'];
        foreach ($indexCbk as $x) {
            $x -= 1;
            $idBarang = $post['id_barang'][$x];
            $idKeranjang = $post['id_keranjang'][$x];
            $arrData[] = ['id_keranjang' => $idKeranjang, 'barang' => $barangModel->find($idBarang), 'qty' => $post['qty'][$x]];
        }
        $data = [
            'judulPage' => "Checkout",
            'jumlahKeranjang' => 0,
            'dataTabel' => $arrData,
            'dataCust' => $cust
        ];

        $data = array_merge($data, $this->data);
        return view('checkout_v', $data);
    }

    public function buat_pesanan()
    {
        $post = $this->request->getPost();

        $model = new \App\Models\Transaksi_m();
        $modelDetail = new \App\Models\Transaksi_detail_m();
        $ntt = new \App\Entities\Transaksi();
        $nttDetail = new \App\Entities\Transaksi_detail();
        $ntt->id_pembeli = $this->session->get('id');
        $ntt->total_harga = $post['total_barang'];
        $ntt->keterangan = $post['keterangan'];
        $ntt->cara_bayar = $post['cara_bayar'];
        $ntt->cara_kirim = $post['pengiriman'];
        $ntt->status_kirim = 0;
        $model->save($ntt);
        $idTransaksi = $model->getInsertID();

        $modalKeranjang = new \App\Models\Keranjang_m();

        foreach ($post['barang'] as $aa) {
            $nttDetail->id_transaksi = $idTransaksi;
            $nttDetail->id_barang = $aa['id_barang'];
            $nttDetail->harga = $aa['harga'];
            $nttDetail->qty = $aa['qty'];
            $modelDetail->save($nttDetail);
            $modalKeranjang->where('id', $aa['id_keranjang'])->delete();
        }
        return redirect()->to(base_url('pesananku'));
    }
}
