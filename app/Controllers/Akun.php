<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Akun extends Controller
{
    protected $data;
    protected $baseCtrl;

    public function __construct()
    {
        $this->baseCtrl = base_url('akun');
        $this->data['judulWeb'] = 'Judul Web';
        $this->data['baseTemplate'] = base_url('template/horizontal');
        helper('form');
        $this->session = session();
    }
    public function index()
    {
        $this->data['judulPage'] = 'Halaman Awal';
        $this->data['urlLupaPassword'] = $this->baseCtrl . '/reset_password';
        $this->data['urlProses'] = 'akun/proses_login';
        $this->data['pesanError'] = $this->session->getFlashdata('pesanError');
        $data = $this->data;
        return view('authLogin_v', $data);
    }

    public function proses_login()
    {
        $nomor_hp = $this->request->getPost('nomor_hp');
        $password = $this->request->getPost('password');

        $model = new \App\Models\Pengguna_m();
        //$tabel = $model->cari(['nomor_hp' => $nomor_hp])->getFirstRow();
        $tabel = $model->where(['nomor_hp' => $nomor_hp, 'password' => $password])->first();
        if ($tabel) {
            $session = session();
            $dtses = [
                'id' => $tabel->id,
                'userGroup' => $tabel->user_group,
                'isLogin' => TRUE,
            ];
            $session->set($dtses);
            return redirect()->to(base_url('home'));
        } else {
            $pesanError = "Data tidak ditemukan!";
            return redirect()->to('index')->withInput()->with('pesanError', $pesanError);
        }
    }
}
