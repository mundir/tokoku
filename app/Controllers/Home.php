<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$this->data['judulPage'] = 'Dashboard';
		$data = $this->data;
		return view('main_v', $data);
	}

	public function detail()
	{
		$this->data['judulPage'] = 'Detail';
		$data = $this->data;
		return view('detail_v', $data);
	}

	//--------------------------------------------------------------------

}
