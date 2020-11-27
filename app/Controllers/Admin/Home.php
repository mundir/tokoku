<?php

namespace App\Controllers\Admin;

class Home extends \App\Controllers\BaseController
{


    public function __construct()
    {
    }

    public function index()
    {
        $this->data['judulPage'] = 'Pesananan Ambil di Toko';
        $this->data['showBack'] = false;
        $this->data['judulCard'] = 'ambil ditoko';
        $this->data['keterangan'] = 'Segera lakukan pengemasan dan menunggu customer untuk ambil barang.';
        $this->data['aktif'] = 'home';
        $this->data['subAktif'] = 'ambil';
        $this->data['proses'] = 'DIKEMAS';
        $model = new \App\Models\Transaksi_m();
        $this->data['dtTabel'] = $model
            ->where('cara_kirim', 'ambil')
            ->where('status_selesai', 'proses')
            ->get()->getResult();

        return view('admin/home_v', $this->data);
    }

    public function kirim()
    {
        $this->data['judulPage'] = 'Pesananan untuk Dikirim';
        $this->data['showBack'] = false;
        $this->data['judulCard'] = 'untuk dikirim';
        $this->data['keterangan'] = 'Segera lakukan proses pengiriman';
        $this->data['aktif'] = 'home';
        $this->data['subAktif'] = 'kirim';
        $this->data['proses'] = 'DIKIRIM';
        $model = new \App\Models\Transaksi_m();
        $this->data['dtTabel'] = $model
            ->where('cara_kirim', 'kirim')
            ->where('status_selesai', 'proses')
            ->get()->getResult();

        return view('admin/home_v', $this->data);
    }

    public function pembayaran()
    {
        $this->data['judulPage'] = 'Proses Pembayaran';
        $this->data['aktif'] = 'home';
        $this->data['subAktif'] = 'bayar';
        return view('underConstruction_v', $this->data);
    }

    public function selesai()
    {
        $this->data['judulPage'] = 'Semua pesanan yang sudah selesai';
        $this->data['aktif'] = 'home';
        $this->data['subAktif'] = 'selesai';
        return view('underConstruction_v', $this->data);
    }
    //--------------------------------------------------------------------

}
