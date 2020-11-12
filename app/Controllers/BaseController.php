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
		if (!session()->has('isLogin')) {
			return redirect()->to(base_url('guest'));
		}

		$this->session = \Config\Services::session();


		$row = $this->get_pengguna($this->session->get('id'));

		$userGroup = $row->user_group;
		$this->data = [
			'judulWeb' => 'Toko Amanah Jaya Online',
			'nama' => $row->nama_pengguna,
			'template' => base_url('template/horizontal'),
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
		$input = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
