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
        $tb[] = $model->find('cara_kirim', 1)->get()->getResult();

        $this->data['card2'] = 'Dikirim';
        $tb[] = $model->find('cara_kirim', 2)->get()->getResult();


        return view('admin/home_v', $this->data);
    }

    //--------------------------------------------------------------------

}
