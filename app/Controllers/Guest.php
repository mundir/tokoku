<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Guest extends Controller
{
    public function index()
    {
        $this->data['judulPage'] = 'Selamat Pagi Kawan..';
        $kategoriModel = new \App\Models\Kategori_m();
        $dtKategori = $kategoriModel->findAll();
        $barangModel = new \App\Models\Barang_m();

        foreach ($dtKategori as $rowKategori) {
            $barang[$rowKategori->id] = $barangModel->where('id_kategori', $rowKategori->id)->get()->getResult();
        }
        $data = [
            'judulWeb' => 'Toko Amanah Jaya Online',
            'judulPage' => 'Selamat Datang',
            'nama' => 'Belum Login',
            'template' => base_url('template/horizontal'),
            'jumlahKeranjang' => 0,
            'dtBarang' => $barang,
            'dtKategori' => $dtKategori,
            'vMenu' => 'layoutMenu_v',
            'isHome' => true
        ];
        return view('mainGuest_v', $data);
    }

    function ambil_data()
    {
        $post = $this->request->getPost();
        $barangModel = new \App\Models\Barang_m();
        $row = $barangModel->find($post['id']);
        echo json_encode($row);
    }


    //--------------------------------------------------------------------

}
