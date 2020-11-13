<?php

namespace App\Controllers\Admin;

class Home extends \App\Controllers\BaseController
{

    protected $id_customer;

    public function __construct()
    {
        $this->id_customer = session()->get('id');
    }
    public function index()
    {
        $this->data['judulPage'] = 'Data Pesanan';
        $model = new \App\Models\Transaksi_m();
        $modelDetail = new \App\Models\Transaksi_detail_m();
        $this->data['card1'] = 'Ambil di Toko';
        $tb[] = $model->where('cara_kirim', 'ambil')->get()->getResult();

        $this->data['card2'] = 'Dikirim';
        $tb[] = $model->where('cara_kirim', 'kirim')->get()->getResult();


        return view('admin/home_v', $this->data);
    }

    //--------------------------------------------------------------------

}
