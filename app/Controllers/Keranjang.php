<?php

namespace App\Controllers;

class Keranjang extends BaseController
{
    public function index()
    {
        $this->data['judulPage'] = 'Halaman Awal';
        $data = $this->data;
        return view('keranjang_v', $data);
    }
}
