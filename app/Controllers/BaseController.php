<?php

namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['form', 'url'];
	protected $data = [];
	protected $session;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:


		$this->session = \Config\Services::session();

		$userGroup = '0';
		$kategoriModel = new \App\Models\Kategori_m();
		$dtKategori = $kategoriModel->findAll();

		if ($this->session->has('isLogin')) {
			$row = $this->get_pengguna($this->session->get('id'));
			if ($this->session->has("jumlahKeranjang")) {
				$jumlahKeranjang = $this->session->get('jumlahKeranjang');
			} else {
				$jumlahKeranjang = 0;
				$this->session->set('jumlahKeranjang' . $jumlahKeranjang);
			}
			$userGroup = $row->user_group;
			$idPengguna = $row->id;
			$nama = $row->nama_pengguna;
			$avatar = $row->avatar;
		} else {
			$idPengguna = 'guest';
			$nama = 'Akun Tamu';
			$avatar = 'default.jpg';
			$jumlahKeranjang = 0;
		}
		$this->data = [
			'judulWeb' => 'Toko Amanah Jaya Online',
			'judulPage' => 'Under Construction',
			'idPengguna' => $idPengguna,
			'nama' => $nama,
			'avatar' => $avatar,
			'jumlahKeranjang' => $jumlahKeranjang,
			'userGroup' => $userGroup,
			'akuns' => $this->vAkun($userGroup),
			'dtKategori' => $dtKategori,
		];
		$this->data['showMenu'] = false;
		$this->data['showKeranjang'] = false;
		$this->data['showBack'] = True;
		$this->data['subAktif'] = '';

		switch ($userGroup) {
			case '0': //guest
				$this->data['vMenu'] = 'layoutMenu_v';
				$this->data['homepg'] = 'home';
				$this->data['backLink'] = 'home';
				break;
			case 'cust': //pengguna umum
				$this->data['vMenu'] = 'layoutMenu_v';
				$this->data['homepg'] = 'home';
				$this->data['backLink'] = 'home';
				break;
			case 'admin': //admin
				$this->data['vMenu'] = 'layoutMenuAdmin_v';
				$this->data['homepg'] = 'admin/home';
				$this->data['backLink'] = 'admin/home';
				break;
			case 'super': // super
				$this->data['vMenu'] = 'layoutMenuSuper_v';
				$this->data['homepg'] = 'admin/home';
				$this->data['backLink'] = 'admin/home';
				break;
		}
	}

	public function get_pengguna($id)
	{
		$model = new \App\Models\Pengguna_m();
		$row = $model->find($id);
		return $row;
	}

	public function totalkeranjang()
	{
		$keranjangModel = new \App\Models\Keranjang_m();
		$totalKeranjang = $keranjangModel->where('id_customer', $this->session->get('id'))->countAllResults();
		return $totalKeranjang;
	}
	private function vAkun($userGroup)
	{
		$profil = [
			'link' => 'profil',
			'icon' => 'icon-user',
			'label' => 'Profilku',
		];
		$admin_profil = [
			'link' => 'admin/akun',
			'icon' => 'icon-user',
			'label' => 'Profilku',
		];
		$logout = [
			'link' => 'akun/logout',
			'icon' => 'icon-logout',
			'label' => 'Logout',
		];
		$login = [
			'link' => 'akun',
			'icon' => 'icon-login',
			'label' => 'Login',
		];
		$vAkuns['0'] = [$profil, $login];
		$vAkuns['cust'] = [$profil, $logout];
		$vAkuns['admin'] = [$admin_profil, $logout];
		$vAkuns['super'] = [$admin_profil, $logout];

		return $vAkuns[$userGroup];
	}

	function myid($awalan = "AJ", $strength = 4)
	{
		$input = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$input_length = strlen($input);
		$random_string = '';
		for ($i = 0; $i < $strength; $i++) {
			$random_character = $input[mt_rand(0, $input_length - 1)];
			$random_string .= $random_character;
		}
		$tgl = date('dmy');
		return $awalan . $tgl . $random_string;
	}
}
