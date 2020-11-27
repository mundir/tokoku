<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    public function __construct()
    {
        $this->session = session();
        helper('form');
        $this->validasi = \Config\Services::validation();
    }
    public function index()
    {
        if ($this->session->has('isLogin')) return redirect()->to('home');
        $data['pesanError'] = $this->session->getFlashdata('pesanError');
        return view('welcome_v', $data);
    }

    public function login()
    {
        $data['pesanError'] = $this->session->getFlashdata('pesanError');
        $data['pesanSukses'] = $this->session->getFlashdata('pesanSukses');
        return view('authLogin_v', $data);
    }

    public function regis()
    {
        $data['pesanError'] = $this->session->getFlashdata('pesanError');
        $data['validasi'] = $this->validasi;
        return view('authRegistrasi_v', $data);
    }

    function login_proses()
    {
        $nomor_hp = $this->request->getPost('nomor_hp');
        $password = $this->request->getPost('password');

        $model = new \App\Models\Pengguna_m();
        $tabel = $model->where(['nomor_hp' => $nomor_hp])->first();
        if ($tabel) {
            if ($password == $tabel->password) {
                $dtses = [
                    'id' => $tabel->id,
                    'userGroup' => $tabel->user_group,
                    'isLogin' => TRUE,
                ];
                $this->session->set($dtses);
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
                $pesanError = "Password salah!";
            }
        } else {
            $pesanError = 'Nomor HP belum terdaftar! <a href="' . base_url('auth/regis') . '"><b>Registrasi</b></a>';
        }
        return redirect()->to('login')->withInput()->with('pesanError', $pesanError);
    }

    function regis_proses()
    {
        $rls = [
            'nomor_hp' => 'required|numeric|is_unique[pengguna.nomor_hp]',
            'nama_pengguna' => 'required|min_length[5]',
            'password' => 'required',
            'repassword' => 'required|matches[password]',
        ];
        if ($this->validate($rls) == false) {
            return redirect()->to('regis')->withInput();
        }
        $model = new \App\Models\Pengguna_m();
        $ntt = new \App\Entities\Pengguna();
        $post = $this->request->getPost();
        $ntt->id = $this->myid();
        $ntt->fill($post);
        $ntt->nama_pendek;
        $ntt->user_group;
        $ntt->avatar = 'default.jpg';
        $ntt->aktif = 1;

        $model->insert($ntt);
        $pesanSukses = '<strong>Berhasil Registrasi!</strong><br>Silahkan Login dengan nomor WA dan password anda';
        return redirect()->to('login')->with('pesanSukses', $pesanSukses);
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
