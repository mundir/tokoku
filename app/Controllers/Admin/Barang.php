<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Barang extends BaseController
{
    protected $folderView;

    public function __construct()
    {
        $this->folderView = 'admin/barang/';
    }
    public function index()
    {
        if ($this->session->has('id_kategori')) {
            $id_kategori = $this->session->get('id_kategori');
            return redirect()->to('tampilkan/' . $id_kategori);
        }
        $kategoriModel = new \App\Models\Kategori_m();
        $dtKategori = $kategoriModel
            ->orderBy('nama_kategori', 'ASC')
            ->get()->getResult();
        $data = [
            'judulPage' => 'Data Barang',
            'dataTabel' => $dtKategori,
            'aktif' => 'home'
        ];
        $data = array_merge($data, $this->data);

        return view($this->folderView . 'main_v', $data);
    }

    public function sesskategori()
    {
        $post = $this->request->getPost();
        $this->session->set('id_kategori', $post['kategori']);
        return redirect()->to('index');
    }

    public function tampilkan($id_kategori = NULL)
    {
        if ($id_kategori == NULL) {
            $id_kategori = $this->session->get('id_kategori');;
        } else {
            $this->session->set('id_kategori', $id_kategori);
        }
        $kategoriModel = new \App\Models\Kategori_m();
        $dtKategori = $kategoriModel->find($id_kategori);
        $namaKategori = $dtKategori->nama_kategori;
        $this->session->set('nama_kategori', $namaKategori);
        $modelBarang = new \App\Models\Barang_m();
        if ($tbBarang = $modelBarang->where('id_kategori', $id_kategori)) {
            $data = [
                'judulPage' => 'Kategori - ' . $namaKategori,
                'rowKategori' => $dtKategori,
                'namaKategori' => $namaKategori,
                'mainTabel' => $tbBarang->paginate(6, 'group1'),
                'pager' => $tbBarang->pager,
                'aktif' => 'kategori'
            ];
            $data = array_merge($this->data, $data);
            return view($this->folderView . 'tabel_v', $data);
        }
        $data = [
            'judulPage' => 'Data Barang - ' . $namaKategori,
            'keterangan' => 'Belum ada data dalam kategori ini. Silahkan tambah data',
            'labelProses' => 'Tambah Data',
        ];
        $data = array_merge($data, $this->data);
        return view($this->folderView . 'notFound_v', $data);
    }


    public function input_data($id = NULL)
    {
        $this->data['validasi'] = \Config\Services::validation();
        $this->data['cancel'] = base_url('admin/barang/tampilkan');
        $id_kategori = $this->session->get('id_kategori');
        $nama_kategori = $this->session->get('nama_kategori');
        if ($id == null) {
            $data = [
                'hidden' => ['id' => '', 'id_kategori' => $id_kategori, 'id_admin' => $this->session->get('id')],
                'judulPage' => 'Tambah ' . $nama_kategori,
                'dataTabel' => '',
                'submit' => 'Tambah',
                'aktif' => 'kategori'
            ];
        } else {
            $modelBarang = new \App\Models\Barang_m();
            $tabel = $modelBarang->find($id);
            $data = [
                'hidden' => ['id' => $id, 'id_kategori' => $id_kategori, 'id_admin' => $this->session->get('id')],
                'judulPage' => 'Edit ' . $nama_kategori,
                'dataTabel' => $tabel,
                'submit' => 'Edit',
                'aktif' => 'kategori'

            ];
        }

        $data = array_merge($this->data, $data);
        return view($this->folderView . 'formEdit_v', $data);
    }

    public function simpan()
    {
        $post = $this->request->getPost();

        $submit = $post['submit'];
        $id = $post['id'];
        $to = ($id != '') ? 'input_data/' . $id : 'input_data';
        $model = new \App\Models\Barang_m();
        $rls = $model->getValidationRules();
        if ($this->validate($rls) == false) {
            return redirect()->to($to)->withInput(); //->with('validasi', $this->validator);
        }
        $ntt = new \App\Entities\Barang();
        switch ($submit) {
            case 'Edit':
                $ntt->id = $id;
                $ntt->fill($post);
                $model->save($ntt);
                return redirect()->to('tampilkan');
                break;
            case 'Tambah':
                $newID = $this->myid($post['id_kategori']);
                $ntt->fill($post);
                $ntt->gambar = 'default.jpg';
                $ntt->id = $newID;
                $model->insert($ntt);
                return redirect()->to('gambar/' . $newID);
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
            'submit' => 'Upload',
            'aktif' => 'kategori',
            'pesanError' => $this->session->getFlashdata('pesanError')
        ];
        $data = array_merge($this->data, $data);
        return view($this->folderView . 'gambar_v', $data);
    }

    public function upload()
    {
        $post = $this->request->getPost();
        $id_barang = $post['id'];
        $id_kategori = $post['id_kategori'];
        $img = $this->request->getFile('gambar');
        if ($img->isValid() && !$img->hasMoved()) {
            $baru = $img->getRandomName();
            $img->move('img/', $baru);
            $newImg = 'img/' . $baru;

            $image = \Config\Services::image();

            // $image->withFile($newImg)
            //     ->resize(400, 400, true, 'width')
            //     ->save(ROOTPATH . 'public/img/kotak/' . $baru);
            $image->withFile($newImg)
                ->fit(400, 400, 'center')
                ->save(ROOTPATH . 'public/img/kotak/' . $baru);

            $image->withFile($newImg)
                ->fit(100, 100, 'center')
                ->save(ROOTPATH . 'public/img/thumb/' . $baru);

            $model = new \App\Models\Barang_m();
            $ntt = new \App\Entities\Barang();
            $ntt->id = $id_barang;
            $ntt->gambar = $baru;
            $model->save($ntt);
            return redirect()->to('tampilkan/' . $id_kategori);

            // $newName = $img->getRandomName();
            // $newPathName = ROOTPATH . 'public/img/' . $newName;
            // $file->move(WRITEPATH . 'uploads', $newName);
            // $img->move(ROOTPATH . 'public/img', $newName);
            // $image = \Config\Services::image();
            // $image->withFile(ROOTPATH . 'public/img/' . $newName)
            //     ->fit(100, 100, 'center')
            //     ->save(ROOTPATH . 'public/img/thumb/' . $newName);
        }

        return redirect()->to('gambar/' . $id_barang)->with('pesanError', 'ambil foto atau cari di file!');
    }

    public function cari()
    {
        $post = $this->request->getPost();
        $modelBarang = new \App\Models\Barang_m();
        $tbBarang = $modelBarang
            ->where('id_kategori', $this->session->get('id_kategori'))
            ->like('nama_barang', $post['txt-cari'])
            ->get()->getResult();
        if ($tbBarang) {
            $data = [
                'judulPage' => 'Hasil Cari "' . $post['txt-cari'] . '"',
                'mainTabel' => $tbBarang,
                'aktif' => 'kategori',
                'backLink' => $this->folderView . 'tampilkan/' . $this->session->get('id_kategori')
            ];
            $this->data = array_merge($this->data, $data);
            return view($this->folderView . 'cari_v', $this->data);
        }
    }

    //--------------------------------------------------------------------

}
