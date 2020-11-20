<?php

namespace App\Controllers;

class Home extends BaseController
{

	public function index()
	{
		$this->data['judulPage'] = 'Hai, ' . $this->data['nama'];
		if ($this->session->has('isLogin')) {
			$jumlahKeranjang = $this->totalkeranjang();

			$this->session->set('jumlahKeranjang', $jumlahKeranjang);
			$this->data['jumlahKeranjang'] = $jumlahKeranjang;
		}

		$barangModel = new \App\Models\Barang_m();

		foreach ($this->data['dtKategori'] as $rowKategori) {
			$barang[$rowKategori->id] = $barangModel->where('id_kategori', $rowKategori->id)->get()->getResult();
		}

		$data = [
			'dtBarang' => $barang,
			'showMenu' => true,
			'showKeranjang' => true,
			'showBack' => false,
			'aktif' => 'home'
		];
		$data = array_merge($this->data, $data);
		return view('main_v', $data);
	}

	public function kategori($id_kategori)
	{
		$kategoriModel = new \App\Models\Kategori_m();
		$dtKategori = $kategoriModel->find($id_kategori);
		$this->data['judulPage'] = $dtKategori->nama_kategori;
		$modelBarang = new \App\Models\Barang_m();
		$tbBarang = $modelBarang->where('id_kategori', $id_kategori);
		$this->data['idKategori'] = $id_kategori;
		$this->data['dtMain'] = $tbBarang->paginate(6, 'group1');
		$this->data['pager'] = $tbBarang->pager;
		$this->data['aktif'] = 'kategori';
		$data = [
			'showMenu' => true,
			'showKeranjang' => true,
			'showBack' => true,

		];
		$this->data = array_merge($this->data, $data);
		return view('barangKategori_v', $this->data);
	}
	public function cari()
	{
		$post = $this->request->getPost();
		$modelBarang = new \App\Models\Barang_m();
		$tbBarang = $modelBarang
			->where('id_kategori', $post['id_kategori'])
			->like('nama_barang', $post['txt-cari'])
			->get()->getResult();
		if ($tbBarang) {
			$data = [
				'judulPage' => 'Hasil Cari',
				'dtBarang' => $tbBarang,
				'showMenu' => true,
				'showKeranjang' => true,
				'showBack' => true,
				'aktif' => 'kategori',
				'backLink' => 'home/kategori/' . $post['id_kategori']
			];
			$this->data = array_merge($this->data, $data);
			return view('barangCari_v', $this->data);
		}
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
		$totalKeranjang = $this->session->get('jumlahKeranjang');
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
			$totalKeranjang++;
			$this->session->set('jumlahKeranjang', $totalKeranjang);
		} else {
			$IDlama = $tbKeranjang->id;
			$ntt->id = $IDlama;
			$qty = $tbKeranjang->qty;
			$qty++;

			$ntt->qty = $qty;
			$model->save($ntt);
		}
		echo $totalKeranjang;
	}

	//--------------------------------------------------------------------

}
