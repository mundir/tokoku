<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		$this->data['judulPage'] = 'Hai, ' . $this->data['nama'];
		$this->data['isLogin'] = false;
		if ($this->data['guest'] == false) {
			$keranjangModel = new \App\Models\Keranjang_m();
			$totalKeranjang = $keranjangModel->where('id_customer', $this->data['idPengguna'])->countAllResults();
			$this->session->set('jumlahKeranjang', $totalKeranjang);
			$this->data['jumlahKeranjang'] = $totalKeranjang;
			$this->data['isLogin'] = true;
		}

		$kategoriModel = new \App\Models\Kategori_m();
		$dtKategori = $kategoriModel->findAll();
		$barangModel = new \App\Models\Barang_m();

		foreach ($dtKategori as $rowKategori) {
			$barang[$rowKategori->id] = $barangModel->where('id_kategori', $rowKategori->id)->get()->getResult();
		}

		$data = [
			'dtBarang' => $barang,
			'dtKategori' => $dtKategori,
			'isHome' => true
		];
		$data = array_merge($this->data, $data);

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
		$ntt->id_customer = $this->data['idPengguna'];
		$tbKeranjang = $model->where('id_customer', $this->data['idPengguna'])->Where('id_barang', $id_barang)->first();
		if (!isset($tbKeranjang)) {
			$newID = $this->myid('KR');
			$ntt->id = $newID;
			$ntt->qty = 1;
			$model->insert($ntt);
			$this->data['jumlahKeranjang']++;
		} else {
			$IDlama = $tbKeranjang->id;
			$ntt->id = $IDlama;
			$qty = $tbKeranjang->qty;
			$qty++;

			$ntt->qty = $qty;
			$model->save($ntt);
		}

		echo $this->data['jumlahKeranjang'];
	}

	//--------------------------------------------------------------------

}
