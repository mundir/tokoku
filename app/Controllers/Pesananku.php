<?php

namespace App\Controllers;

class Pesananku extends BaseController
{

	protected $totalKeranjang;

	public function __construct()
	{
		$keranjangModel = new \App\Models\Keranjang_m();
		$this->totalKeranjang = $keranjangModel->where('id_customer', session()->get('id'))->countAllResults();
	}
	public function index()
	{
		echo $this->myid();
		return;
		$this->data['judulPage'] = 'Pesanan Saya';
		$this->data['jumlahKeranjang'] = $this->totalKeranjang;
		$transaksiModel = new \App\Models\Transaksi_m();
		$transaksiDetailModel = new \App\Models\Transaksi_detail_m();
		$tabelTransaksi = $transaksiModel
			->where('id_pembeli', $this->session->get('id'))
			->get()->getResult();
		foreach ($tabelTransaksi as $row) {
			$dtDetail = $transaksiDetailModel
				->select('barang.nama_barang, transaksi_detail.harga')
				->join('barang', 'transaksi_detail.id_barang=barang.id')
				->where('id_transaksi', $row->id)
				->get()->getResult();
			$dtTabel[] = ['total_harga' => $row->total_harga, 'detail' => $dtDetail];
		}
		$this->data['dtTabel'] = $dtTabel;
		return view('pesananku_v', $this->data);
	}

	public function index2()
	{
		$this->data['judulPage'] = 'Pesanan Saya';

		$transaksiModel = new \App\Models\Transaksi_m();
		$dtTransaksi = $transaksiModel->where('id_pembeli', $this->session->get('id'))->get()->getResult();
		dd($dtTransaksi);
		$data = [
			'jumlahKeranjang' => $this->totalKeranjang,
		];
		$data = array_merge($data, $this->data);
		return view('pesananku_v', $data);
	}
}
