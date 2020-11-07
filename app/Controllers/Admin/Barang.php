<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    protected $mainView = 'admin/barang/';
    protected $ctrl;
    public function __construct()
    {
        $this->ctrl = base_url('admin/barang');
    }
    public function index()
    {
        $kategoriModel = new \App\Models\Kategori_m();
        $dtKategori = $kategoriModel->findAll();
        $data = [
            'judulPage' => 'Data Barang',
            'dataTabel' => $dtKategori,
        ];
        $data = array_merge($data, $this->data);

        return view($this->mainView . 'main_v', $data);
    }

    function coba()
    {
        $data = $this->session->getFlashdata('ss');
        dd($data);
    }

    public function tampilkan()
    {
        $post = $this->request->getPost();
        $id_kategori = $post['kategori'];
        $kategoriModel = new \App\Models\Kategori_m();
        $dtKategori = $kategoriModel->find($id_kategori);
        $namaKategori = $dtKategori->nama_kategori;
        $modelBarang = new \App\Models\Barang_m();
        if ($tbBarang = $modelBarang->where('id_kategori', $id_kategori)->get()->getResult()) {
            $data = [
                'judulPage' => 'Kategori - ' . $namaKategori,
                'namaKategori' => $namaKategori,
                'mainTabel' => $tbBarang,
                'mainCtrl' => $this->ctrl,
                'linkTambah' => $this->ctrl . '/tambah/' . $id_kategori,
            ];
            $data = array_merge($data, $this->data);
            return view($this->mainView . 'tabel_v', $data);
        }
        $data = [
            'judulPage' => 'Data Barang - ' . $namaKategori,
            'dataTabel' => $tbBarang,
            'keterangan' => 'Belum ada data dalam kategori ini. Silahkan tambah data',
            'labelProses' => 'Tambah Data',
            'mainCtrl' => $this->ctrl,
        ];
        $data = array_merge($data, $this->data);
        return view($this->mainView . 'notFound_v', $data);
    }
    public function tambah($id_kategori)
    {
        $data = [
            'judulPage' => 'Tambah Data',
            'dataTabel' => '',
            'id_kategori' => $id_kategori,
            'mainCtrl' => $this->ctrl,
            'submit' => 'Tambah',
        ];
        $data = array_merge($data, $this->data);
        return view($this->mainView . 'form_v', $data);
    }

    public function simpan()
    {
        $post = $this->request->getPost();

        $submit = $post['submit'];
        $model = new \App\Models\Barang_m();
        $ntt = new \App\Entities\Barang();
        switch ($submit) {
            case 'Tambah':
                $ntt->fill($post);
                $model->save($ntt);
                $id = $model->insertID();

                return redirect()->to('barang/gambar/' . $id);
                break;
            case 'Edit':
                break;
        }
    }

    function gambar($id)
    {
        $model = new \App\Models\Barang_m();
        $tabel = $model->find($id);
        $data = [
            'judulPage' => 'Edit Gambar',
            'dataTabel' => $tabel,
            'mainCtrl' => $this->ctrl,
            'submit' => 'Upload',
        ];
        $data = array_merge($data, $this->data);
        return view($this->mainView . 'gambar_v', $data);
    }

    public function upload()
    {
        $img = $this->request->getFile('gambar');
        if ($img->isValid() && !$img->hasMoved()) {
            $aa = $img->getPathname();
            $baru = $img->getRandomName();
            $image = \Config\Services::image();
            $image->withFile($aa)
                ->resize(400, 400, true, 'height')
                ->save(ROOTPATH . 'public/img/' . $baru);
            $image->withFile(ROOTPATH . 'public/img/' . $baru)
                ->fit(100, 100, 'center')
                ->save(ROOTPATH . 'public/img/thumb/' . $baru);
            dd($aa);

            // $newName = $img->getRandomName();
            // $newPathName = ROOTPATH . 'public/img/' . $newName;
            // $file->move(WRITEPATH . 'uploads', $newName);
            // $img->move(ROOTPATH . 'public/img', $newName);
            // $image = \Config\Services::image();
            // $image->withFile(ROOTPATH . 'public/img/' . $newName)
            //     ->fit(100, 100, 'center')
            //     ->save(ROOTPATH . 'public/img/thumb/' . $newName);
        }
    }

    //--------------------------------------------------------------------

}
