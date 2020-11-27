<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Pengguna extends BaseController
{
    public function __construct()
    {
        $this->folderView = 'admin/pengguna/';
    }
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
        return view($this->folderView . 'main_v', $this->data);
    }
    public function super()
    {
        $this->data['judulPage'] = 'Data Manager';
        $this->data['aktif'] = 'pengguna';
        $this->data['subAktif'] = 'super';
        $userModel = new \App\Models\Pengguna_m();
        $tbUser = $userModel
            ->where('user_group', 'super')
            ->get()->getResult();
        $this->data['tbMain'] = $tbUser;
        return view($this->folderView . 'main_v', $this->data);
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
        return view($this->folderView . 'main_v', $this->data);
    }

    function tambah()
    {
        $judul = "Tambah pengguna";
        $tabel = '';
        $submit = 'Tambah';
        $data = $this->in_data($judul, $tabel, $submit);
        return view($this->folderView . 'form_v', $data);
    }
    function edit($id)
    {
        $model = new \App\Models\Pengguna_m();
        $tabel = $model->find($id);
        $judul = "Edit Data pengguna";
        $tabel = $tabel;
        $submit = 'Edit';
        $data = $this->in_data($judul, $tabel, $submit);
        return view($this->folderView . 'form_v', $data);
    }
    function in_data($judul, $tabel, $submit)
    {
        $gg = ['super' => 'Manager', 'admin' => 'Admin', 'cust' => 'Customer'];

        $data = [
            'cancel' => base_url('admin/pengguna/index'),
            'judulPage' => $judul,
            'dataTabel' => $tabel,
            'ugoptions' => $gg,
            'validasi' => \Config\Services::validation(),
            'submit' => $submit,
            'aktif' => 'pengguna',
            'pesanError' => $this->session->getFlashdata('pesanError')
        ];
        $data = array_merge($this->data, $data);
        return $data;
    }

    function simpan()
    {
        $post = $this->request->getPost();
        $id = $post['id'];
        $submit = $post['submit'];

        $rls = [
            'nama_pengguna' => 'required',
            'nama_pendek' => 'required|alpha_numeric|max_length[10]',
            'nomor_hp' => 'required|numeric',
            'password' => 'required',
        ];
        $to = ($submit == 'Tambah') ? 'tambah' : 'edit/' . $id;
        if ($this->validate($rls) == false) {
            return redirect()->to($to)->withInput();
        }

        $model = new \App\Models\Pengguna_m();
        $ntt = new \App\Entities\Pengguna();

        $ntt->fill($post);
        if ($submit == 'Tambah') {
            $ntt->id = $this->myid();
            $model->insert($ntt);
        } else {
            $model->save($ntt);
        }
        return redirect()->to('index');
    }
}
