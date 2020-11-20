<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Akun extends BaseController
{
    protected $folderView;

    public function __construct()
    {
        $this->folderView = 'admin/akun/';
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

    function ganti_foto()
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

    function upload()
    {
        $img = $this->request->getFile('avatar');
        if ($img->isValid() && !$img->hasMoved()) {
            $newName = $this->session->get('id') . '.' . $img->getExtension();
            if (file_exists("img/profil/original/$newName")) unlink("img/profil/original/$newName");
            if (file_exists("img/profil/kotak/$newName")) unlink("img/profil/kotak/$newName");
            if (file_exists("img/profil/$newName")) unlink("img/profil/$newName");

            $img->move('img/profil/original', $newName);
            $newName = $img->getName();
            $image = \Config\Services::image();

            $newImg = 'img/profil/original/' . $newName;

            $image->withFile($newImg)
                ->fit(400, 400, 'center')
                ->save('img/profil/kotak/' . $newName);

            $image->withFile($newImg)
                ->resize(100, 100, false, 'width')
                ->save('img/profil/' . $newName);

            $model = new \App\Models\Pengguna_m();
            $ntt = new \App\Entities\Pengguna();
            $ntt->id = $this->session->get('id');;
            $ntt->avatar = $newName;
            $model->save($ntt);
            return redirect()->to('index');
        }
        return redirect()->to('ganti_foto')->with('pesanError', 'Tidak bisa upload. Coba ganti gambar yang lain');
    }
}
