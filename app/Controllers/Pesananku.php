<?php

namespace App\Controllers;

class Pesananku extends BaseController
{

	public function index()
	{
		$this->data['judulPage'] = 'Pesanan Ambil di Toko';
		$this->data['aktif'] = 'pesananku';
		$where =
			[
				'id_pembeli' => $this->session->get('id'),
				'cara_kirim' => 'ambil',
				'status_selesai' => 'proses'
			];
		$tabel = $this->_ambildata($where);
		$data = [
			'dtTabel' => $tabel,
			'showMenu' => true,
			'showKeranjang' => true,
			'showBack' => true,
			'aktif' => 'pesanan',
			'showBayar' => TRUE,
			'showExp' => true
		];

		$this->data = array_merge($this->data, $data);
		return view('pesananku/proses_v', $this->data);
	}

	public function kirim()
	{
		$this->data['judulPage'] = 'Pesanan Dikirim ke Alamat Anda';
		$this->data['aktif'] = 'pesananku';
		$where =
			[
				'id_pembeli' => $this->session->get('id'),
				'cara_kirim' => 'kirim',
				'status_selesai' => 'proses'
			];
		$tabel = $this->_ambildata($where);
		$data = [
			'dtTabel' => $tabel,
			'showMenu' => true,
			'showKeranjang' => true,
			'showBack' => true,
			'aktif' => 'pesanan',
			'showBayar' => TRUE,
			'showExp' => false
		];

		$this->data = array_merge($this->data, $data);
		return view('pesananku/proses_v', $this->data);
	}

	public function selesai()
	{
		$this->data['judulPage'] = 'Pesanan Dikirim ke Alamat Anda';
		$this->data['aktif'] = 'pesananku';
		$where =
			[
				'id_pembeli' => $this->session->get('id'),
				'status_selesai' => 'selesai'
			];
		$tabel = $this->_ambildata($where);
		$data = [
			'dtTabel' => $tabel,
			'showMenu' => true,
			'showKeranjang' => true,
			'showBack' => true,
			'aktif' => 'pesanan',
			'showBayar' => TRUE,
			'showExp' => false
		];

		$this->data = array_merge($this->data, $data);
		return view('pesananku/proses_v', $this->data);
	}

	public function batal()
	{
		$this->data['judulPage'] = 'Pesanan Dikirim ke Alamat Anda';
		$this->data['aktif'] = 'pesananku';
		$where =
			[
				'id_pembeli' => $this->session->get('id'),
				'status_selesai' => 'batal'
			];
		$tabel = $this->_ambildata($where);
		$data = [
			'dtTabel' => $tabel,
			'showMenu' => true,
			'showKeranjang' => true,
			'showBack' => true,
			'aktif' => 'pesanan',
			'showBayar' => TRUE,
			'showExp' => false
		];

		$this->data = array_merge($this->data, $data);
		return view('pesananku/proses_v', $this->data);
	}



	private function _ambildata($where)
	{
		$datax = array();
		$transaksiModel = new \App\Models\Transaksi_m();
		$transaksiDetailModel = new \App\Models\Transaksi_detail_m();
		$tabel = $transaksiModel
			->where($where)
			->get()->getResult();
		foreach ($tabel as $row) {
			$dtDetail = $transaksiDetailModel
				->select('barang.nama_barang, barang.gambar, transaksi_detail.qty, transaksi_detail.harga as hrg')
				->join('barang', 'transaksi_detail.id_barang=barang.id')
				->where('id_transaksi', $row->id)
				->orderBy('created_at', 'DESC')
				->get()->getResult();
			$datax[] = ['transaksi' => $row, 'detail' => $dtDetail];
		}
		return $datax;
	}
}
