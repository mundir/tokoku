<?php

namespace App\Controllers;

class Pesananku extends BaseController
{

	public function index()
	{
		$this->data['judulPage'] = 'Pesanan Belum Bayar';
		$this->data['aktif'] = 'blmbayar';
		//bayar QR-Code
		$where = [
			'id_pembeli' => $this->session->get('id'),
			'status_bayar' => 0,
			'cara_bayar' => 'qrcode'
		];

		$dtqrcode = $this->_ambildata($where);
		//bayar Transfer
		$where = [
			'id_pembeli' => $this->session->get('id'),
			'status_bayar' => 0,
			'cara_bayar' => 'transfer'
		];

		$dtTransfer = $this->_ambildata($where);

		$data = [
			'dtTabel' => array_merge($dtqrcode, $dtTransfer),
			'showMenu' => true,
			'showKeranjang' => true,
			'showBack' => true,
			'aktif' => 'pesanan',
			'showBayar' => TRUE
		];

		$this->data = array_merge($this->data, $data);
		return view('pesananku_v', $this->data);
	}

	public function dikemas()
	{
		$this->data['judulPage'] = 'Pesanan Dikemas';
		$this->data['aktif'] = 'dikemas';
		//dikemas
		$where = [
			'id_pembeli' => $this->session->get('id'),
			'cara_kirim' => 'kirim',
		];
		$this->data['dtTabel'] = $this->_ambildata($where);
		return view('pesananku_v', $this->data);
	}

	public function dikirim()
	{
		$this->data['judulPage'] = 'Pesanan Dikirim';
		//dikirim
		$where = [
			'id_pembeli' => $this->session->get('id'),
			'cara_kirim' => 'kirim',
			'status_kirim' => 1
		];
		$this->data['dtTabel'] = $this->_ambildata($where);
		return view('pesananku_v', $this->data);
	}

	public function selesai()
	{
		$this->data['judulPage'] = 'Pesanan Selesai';
		//selesai
		$where = [
			'id_pembeli' => $this->session->get('id'),
			'cara_kirim' => 'kirim',
			'status_selesai' => 1
		];
		$this->data['dtTabel'] = $this->_ambildata($where);
		return view('pesananku_v', $this->data);
	}

	public function bayar()
	{
		$post = $this->request->getPost();
		$modelTransaksi = new \App\Models\Transaksi_m();
		$tabel = $modelTransaksi->find($post['id']);
		$caraBayar = $tabel->cara_bayar;

		switch ($caraBayar) {
			case 'tunai':
				$view = 'bayarTunai_v';
				break;
			case "qrcode":
				break;
			case 'transfer':
				break;
		}
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
				->select('barang.nama_barang, barang.gambar, transaksi_detail.*')
				->join('barang', 'transaksi_detail.id_barang=barang.id')
				->where('id_transaksi', $row->id)
				->get()->getResult();
			$datax[] = ['transaksi' => $row, 'detail' => $dtDetail];
		}
		return $datax;
	}
}
