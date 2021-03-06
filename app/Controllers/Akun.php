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
        $this->validasi = \Config\Services::validation();
    }
    public function index()
    {
        $this->data['judulPage'] = 'Halaman Awal';
        $this->data['urlLupaPassword'] = $this->baseCtrl . '/reset_password';
        $this->data['urlProses'] = 'akun/proses_login';
        $this->data['pesanError'] = $this->session->getFlashdata('pesanError');
        $data = $this->data;
        return view('welcome_v', $data);
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
            switch ($tabel->user_group) {
                case 'super':
                    return redirect()->to(base_url('admin/home'));
                    break;
                case 'admin':
                    return redirect()->to(base_url('admin/home'));
                    break;
                case 'cust':
                    return redirect()->to(base_url('home'));
                    break;
            }
        } else {
            $pesanError = "Data tidak ditemukan!";
            return redirect()->to('index')->withInput()->with('pesanError', $pesanError);
        }
    }

    public function registrasi()
    {

        $this->data['judulPage'] = 'Halaman Awal';
        $this->data['pesanError'] = $this->session->getFlashdata('pesanError');
        $this->data['validasi'] = $this->validasi;
        $data = $this->data;
        return view('authRegistrasi_v', $data);
    }

    public function user_reg()
    {
        $this->data['judulPage'] = 'Halaman Awal';
        $this->data['pesanError'] = $this->session->getFlashdata('pesanError');
        $this->data['validasi'] = $this->validasi;
        $data = $this->data;
        return view('authUserReg_v', $data);
    }

    public function registrasi_proses()
    {
        $rls = [
            'password' => 'required',
            'repassword' => 'required|matches[password]',
            'nomor_hp' => 'required|numeric|is_unique[pengguna.nomor_hp]',
            'nama_pengguna' => 'required|min_length[5]',
            'referensi' => 'required'
        ];
        if ($this->validate($rls) == false) {
            return redirect()->to('registrasi')->withInput();
        }
        $model = new \App\Models\Pengguna_m();
        $ntt = new \App\Entities\Pengguna();
        $post = $this->request->getPost();
        $ntt->id = $this->myid();
        $ntt->fill($post);

        $model->insert($ntt);
        return redirect()->to('index');
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to('index');
    }

    function myid($awalan = "AJ", $strength = 4)
    {
        $input = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        $tgl = date('dmy');
        return $awalan . $tgl . $random_string;
    }
}
