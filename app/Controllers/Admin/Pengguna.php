<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pengguna extends BaseController
{
    public function index()
    {
        $this->data['judulPage'] = 'Data Admin';
        $this->data['aktif'] = 'pengguna';
        $this->data['subAktif'] = 'admin';
        $userModel = new \App\Models\Pengguna_m();
        $tbUser = $userModel
            ->where('user_group', 'admin')
            ->get()->getResult();
        $this->data['tbMain'] = $tbUser;
        return view('admin/pengguna/main_v', $this->data);
    }
    public function customer()
    {
        $this->data['judulPage'] = 'Data Customer';
        $this->data['aktif'] = 'pengguna';
        $this->data['subAktif'] = 'customer';
        $userModel = new \App\Models\Pengguna_m();
        $tbUser = $userModel
            ->where('user_group', 'cust')
            ->get()->getResult();
        $this->data['tbMain'] = $tbUser;
        return view('admin/pengguna/main_v', $this->data);
    }
}
