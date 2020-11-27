<?php

namespace App\Controllers;

class Profilku extends BaseController
{
    public function __construct()
    {
        $this->folderView = 'profilku/';
    }
    public function index()
    {
        $modelPengguna = new \App\Models\Pengguna_m();
        $tbPengguna = $modelPengguna->find($this->session->get('id'));

        $data = [
            'judulPage' => 'Profil Saya',
            'aktif' => 'akun',
            'dataTabel' => $tbPengguna,
        ];

        $data = array_merge($this->data, $data);

        return view($this->folderView . 'index_v', $data);
    }

    public function ganti_foto()
    {
        $id_user = $this->session->get('id');
        $model = new \App\Models\Pengguna_m();
        $tabel = $model->find($id_user);
        $data = [
            'judulPage' => 'upload Foto',
            'foto' => $tabel->avatar,
            'submit' => 'Upload',
            'aktif' => 'akun',
            'pesanError' => $this->session->getFlashdata('pesanError')
        ];
        $data = array_merge($this->data, $data);
        return view($this->folderView . 'gantiFoto_v', $data);
    }
    function simpan_foto()
    {
        $image = $_POST['image'];

        list($type, $image) = explode(';', $image);
        list(, $image) = explode(',', $image);

        $image = base64_decode($image);
        $image_name = $this->session->get('id') . '.png';
        file_put_contents('profil/detail/' . $image_name, $image);

        $image = \Config\Services::image();

        $newImg = 'profil/detail/' . $image_name;
        $image->withFile($newImg)
            ->resize(100, 100, true, 'width')
            ->save('profil/thumb/' . $image_name);

        $model = new \App\Models\Pengguna_m();
        $ntt = new \App\Entities\Pengguna();
        $ntt->id = $this->session->get('id');;
        $ntt->avatar = $image_name;
        $model->save($ntt);

        echo base_url('profilku');
    }
    function edit()
    {
        $id_user = $this->session->get('id');
        $model = new \App\Models\Pengguna_m();
        $tabel = $model->find($id_user);
        $data = [
            'cancel' => base_url('profilku'),
            'judulPage' => 'Edit Dataku',
            'dataTabel' => $tabel,
            'validasi' => \Config\Services::validation(),
            'submit' => 'Simpan',
            'aktif' => 'akun',
            'pesanError' => $this->session->getFlashdata('pesanError')
        ];
        $data = array_merge($this->data, $data);

        return view($this->folderView . 'form_v', $data);
    }
    function simpan()
    {
        $id_user = $this->session->get('id');
        $post = $this->request->getPost();

        $model = new \App\Models\Pengguna_m();

        $rls = [
            'nama_pengguna' => 'required',
            'nama_pendek' => 'required',
            'password' => 'required',
            'alamat' => 'required',
        ];
        if ($this->validate($rls) == false) {
            return redirect()->to('edit')->withInput();
        }

        $ntt = new \App\Entities\Pengguna();

        $ntt->id = $id_user;
        $ntt->fill($post);
        $model->save($ntt);
        return redirect()->to('index');
    }
}
