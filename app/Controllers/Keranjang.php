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
            'dtKeranjang' => $dtKeranjang,
            'showMenu' => true,
            'showKeranjang' => false,
            'showBack' => true,
            'aktif' => 'keranjang',
        ];
        $data = array_merge($this->data, $data);

        return view('keranjang_v', $data);
    }

    public function proses()
    {
        $post = $this->request->getPost();
        if (!isset($post['cbk'])) return redirect()->to('index')->with('pesanError', 'Anda belum memilih barang.<br>Klik Centang untuk pilih barang');
        $customerModel = new \App\Models\Pengguna_m();
        $cust = $customerModel->find($this->session->get('id'));
        $barangModel = new \App\Models\Barang_m();
        $keranjangModel = new \App\Models\Keranjang_m();
        $keranjangNtt = new \App\Entities\Keranjang();

        $indexCbk = $post['cbk'];
        foreach ($indexCbk as $x) {
            $x -= 1;
            $idBarang = $post['id_barang'][$x];
            echo $idBarang;
            $idKeranjang = $post['id_keranjang'][$x];
            $arrData[] = ['id_keranjang' => $idKeranjang, 'barang' => $barangModel->find("$idBarang"), 'qty' => $post['qty'][$x]];
            $keranjangNtt->id = $idKeranjang;
            if ($keranjangNtt->qty != $post['qty'][$x]) {
                $keranjangNtt->qty = $post['qty'][$x];
                $keranjangModel->save($keranjangNtt);
            }
        }
        $data = [
            'judulPage' => "Checkout",
            'dataTabel' => $arrData,
            'dataCust' => $cust
        ];

        $data = array_merge($this->data, $data);
        return view('checkoutWizard_v', $data);
    }

    public function buat_pesanan()
    {
        $post = $this->request->getPost();

        $model = new \App\Models\Transaksi_m();
        $modelDetail = new \App\Models\Transaksi_detail_m();
        $ntt = new \App\Entities\Transaksi();
        $nttDetail = new \App\Entities\Transaksi_detail();

        $newID = $this->myid('TR');
        // 'id', 'id_pembeli', 'harga_barang',
        // 'biaya_penanganan', 'biaya_pengiriman', 'total_harga',
        // 'keterangan', 'cara_bayar', 'cara_kirim', 'status_bayar', 'status_kirim',
        $ntt->id = $newID;
        $ntt->id_pembeli = $this->session->get('id');
        $d = strtotime("+3 days");
        $ntt->expired_at = date("Y-m-d h:i:s", $d);
        $ntt->fill($post);
        $model->insert($ntt);

        $modalKeranjang = new \App\Models\Keranjang_m();

        foreach ($post['barang'] as $aa) {
            $nttDetail->id_transaksi = $newID;
            $nttDetail->id_barang = $aa['id_barang'];
            $nttDetail->harga = $aa['harga'];
            $nttDetail->qty = $aa['qty'];
            $modelDetail->save($nttDetail);
            $modalKeranjang->where('id', $aa['id_keranjang'])->delete();
            // $tabelBarang = $modelBarang->find($aa['id_barang']);
            // $stok = $tabelBarang->stok;
            // $stok -= $aa['qty'];
            // $nttBarang->id=$aa['id_barang'];
            // $nttBarang->stok=$stok;
        }
        return redirect()->to(base_url('pesananku'));
    }
}
