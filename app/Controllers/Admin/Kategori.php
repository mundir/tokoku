<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    protected $folderView;

    public function __construct()
    {
        $this->folderView = 'admin/kategori/';
    }
    public function index()
    {
        $kategoriModel = new \App\Models\Kategori_m();
        $dtKategori = $kategoriModel->find();
        $data = [
            'judulPage' => 'Kategori Barang',
            'dataTabel' => $dtKategori,
            'aktif' => 'kategori'
        ];
        $data = array_merge($this->data, $data);

        return view($this->folderView . 'main_v', $data);
    }

    public function tampilkan($id)
    {
        $kategoriModel = new \App\Models\Kategori_m();
        $dtKategori = $kategoriModel->find();
        $data = [
            'judulPage' => 'Kategori Barang',
            'dataTabel' => $dtKategori,
            'aktif' => 'kategori'
        ];
        $data = array_merge($this->data, $data);

        return view($this->folderView . 'main_v', $data);
    }

    public function tambah()
    {
        $judul = "Tambah Kategori";
        $tabel = $this->_newid();
        $submit = 'Tambah';
        $data = $this->_in_data($judul, $tabel, $submit);
        return view($this->folderView . 'form_v', $data);
    }

    public function edit($id)
    {
        $model = new \App\Models\Kategori_m();
        $tabel = $model->find($id);
        $judul = "Edit Data Kategori";
        $submit = 'Edit';
        $data = $this->_in_data($judul, $tabel, $submit);
        return view($this->folderView . 'form_v', $data);
    }


    private function _in_data($judul, $tabel, $submit)
    {
        $model = new \App\Models\Kategori_group_m();
        $tabelKatGroup = $model->findAll();
        $data = [
            'judulPage' => $judul,
            'dataTabel' => $tabel,
            'dataGroup' => $tabelKatGroup,
            'validasi' => \Config\Services::validation(),
            'submit' => $submit,
            'cancel' => base_url('admin/kategori/index'),
            'aktif' => 'kategori'
        ];
        return $data = array_merge($this->data, $data);
    }

    public function simpan()
    {
        $post = $this->request->getPost();
        $id = $post['id'];
        $submit = $post['submit'];
        $to = ($submit == 'Tambah') ? 'tambah' : 'edit/' . $id;
        $rules = [
            'nama_kategori' => 'required'
        ];
        if ($this->validate($rules) == false)  return redirect()->to($to)->withInput();
        $model = new \App\Models\Kategori_m();
        $ntt = new \App\Entities\Kategori();
        $ntt->id = $post['id'];
        $ntt->fill($post);

        ($submit == 'Tambah') ? $model->insert($ntt) : $model->save($ntt);
        return redirect()->to('index');
    }

    private function _newid($strength = 4)
    {
        $input = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }
}
