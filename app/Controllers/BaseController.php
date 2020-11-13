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

		if ($this->session->has('isLogin')) {
			$row = $this->get_pengguna($this->session->get('id'));
			if ($this->session->has("jumlahKeranjang")) {
				$jumlahKeranjang = $this->session->get('jumlahKeranjang');
			} else {
				$jumlahKeranjang = 0;
			}
			$userGroup = $row->user_group;
			$idPengguna = $row->id;
			$nama = $row->nama_pengguna;
			$avatar = $row->avatar;
			$guest = false;
		} else {
			$userGroup = 3;
			$idPengguna = 'guest';
			$nama = 'Akun Tamu';
			$avatar = 'default.jpg';
			$guest = true;
			$jumlahKeranjang = 0;
		}

		$this->data = [

			'judulWeb' => 'Toko Amanah Jaya Online',
			'idPengguna' => $idPengguna,
			'nama' => $nama,
			'avatar' => $avatar,
			'guest' => $guest,
			'template' => base_url('template/horizontal'),
			'jumlahKeranjang' => $jumlahKeranjang,
			'isHome' => false
		];
		switch ($userGroup) {
			case 1: //superadmin
				$this->data['vMenu'] = 'layoutMenuSuper_v';
				break;
			case 2: // admin
				$this->data['vMenu'] = 'layoutMenuAdmin_v';
				break;
			case 3: //pengguna umum
				$this->data['vMenu'] = 'layoutMenu_v';
				break;
			default:
				return redirect()->to('login');
		}
	}

	public function get_pengguna($id)
	{
		$model = new \App\Models\Pengguna_m();
		$row = $model->find($id);
		return $row;
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
