<?php

namespace App\Controllers;

class Home extends BaseController
{

	protected $totalKeranjang;
	protected $id_customer;

	public function __construct()
	{
		$this->id_customer = session()->get('id');
		$keranjangModel = new \App\Models\Keranjang_m();
		$this->totalKeranjang = $keranjangModel->where('id_customer', $this->id_customer)->countAllResults();
	}
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
			'jumlahKeranjang' => $this->totalKeranjang,
			'dtBarang' => $barang,
			'dtKategori' => $dtKategori,
			'isLogin' => true
		];
		$data = array_merge($data, $this->data);
		$data['isHome'] = true;
		return view('main_v', $data);
	}

	public function keranjang()
	{
		$idCustomer = $this->session->get('id');
		$keranjangModel = new \App\Models\Keranjang_m();
		$dtKeranjang = $keranjangModel
			->select('keranjang.*,barang.*')
			->join('barang', 'keranjang.id_barang=barang.id')
			->where('id_customer', $idCustomer)
			->get()->getResult();
		$data = [
			'judulPage' => "Keranjang Belanja",
			'jumlahKeranjang' => $this->totalKeranjang,
			'dtKeranjang' => $dtKeranjang,
		];
		$data = array_merge($data, $this->data);

		return view('keranjang_v', $data);
	}
	function ambil_data()
	{
		$post = $this->request->getPost();
		$barangModel = new \App\Models\Barang_m();
		$row = $barangModel->find($post['id']);
		echo json_encode($row);
	}


	public function tambah_keranjang()
	{
		$post = $this->request->getPost();
		$id_barang = $post['id'];
		$model = new \App\Models\Keranjang_m();
		$ntt = new \App\Entities\Keranjang();
		$ntt->id_barang = $id_barang;
		$ntt->id_customer = $this->id_customer;

		$tbKeranjang = $model->where('id_customer', $this->id_customer)->Where('id_barang', $id_barang)->first();
		if (!isset($tbKeranjang)) {
			$lead = str_pad($this->id_customer . $id_barang, 4, '0', STR_PAD_LEFT);
			$newID = uniqid($lead);
			$ntt->id = $newID;
			$ntt->qty = 1;
			$model->insert($ntt);
			$this->totalKeranjang++;
		} else {
			$IDlama = $tbKeranjang->id;
			$ntt->id = $IDlama;
			$qty = $tbKeranjang->qty;
			$qty++;
			$ntt->qty = $qty;
			$model->save($ntt);
		}

		echo $this->totalKeranjang;
	}

	//--------------------------------------------------------------------

}
