<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LiveChat extends BaseController
{
	public function index()
	{

		$data = [];

		echo view('templates/header', $data);
		echo view('chat');
		echo view('templates/footer');
	}

}