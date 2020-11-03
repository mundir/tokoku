<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$this->data['judulPage'] = 'Halaman Awal';
		$kategoriModel = new \App\Models\Kategori_m();
		$dtKategori = $kategoriModel->findAll();
		$barangModel = new \App\Models\Barang_m();

		foreach ($dtKategori as $rowKategori) {
			$barang[$rowKategori->id] = $barangModel->where('id_kategori', $rowKategori->id)->get()->getResult();
		}
		$data = [
			'dtBarang' => $barang,
			'dtKategori' => $dtKategori,
		];
		$data = array_merge($data, $this->data);

		return view('main_v', $data);
	}

	public function detail()
	{
		$this->data['judulPage'] = 'Detail';
		$data = $this->data;
		return view('detail_v', $data);
	}

	public function keranjang()
	{
		$this->data['judulPage'] = 'Keranjang';
		$data = $this->data;
		return view('keranjang_v', $data);
	}

	public function checkout()
	{
		$this->data['judulPage'] = 'Buat Pesanan';
		$data = $this->data;
		return view('checkout_v', $data);
	}

	//--------------------------------------------------------------------

}
