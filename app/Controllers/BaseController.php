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
		if (!$this->session->get('isLogin')) {
			return redirect()->to(base_url('akun/index'));
		}
		$row = $this->get_pengguna($this->session->get('id'));

		$this->data = [
			'judulWeb' => 'Toko Amanah Jaya Online',
			'nama' => $row->nama_pengguna,
			'template' => base_url('template/horizontal') . '/'
		];
	}

	public function get_pengguna($id)
	{
		$model = new \App\Models\Pengguna_m();
		$row = $model->find($id);
		return $row;
	}
}
