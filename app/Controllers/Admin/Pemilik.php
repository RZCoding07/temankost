<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PemilikModel;
use App\Models\PenggunaModel;
class Pemilik extends BaseController
{
	protected $title="Pemilik";
	protected $base="Admin/Pemilik";

	public function index()
	{
		$data=[
			"title" =>$this->title,
      "base"  =>$this->base
		];
		return view('admin/pemilik/index',$data);
	}
	public function table()
	{
		$Pemilik=new PenggunaModel;
		$data=[

			"Pemilik"	=>$Pemilik->pemilik()
		];
		return view('admin/pemilik/table',$data);
	}
	function add ()
	{
		
		$User=new PenggunaModel;
		$data=[
			"nama"=>$this->request->getVar('nama'),
			"password"=>$this->request->getVar('password'),
			"email"=>$this->request->getVar('email'),
			"pemilik"=>"Ya",
			"telepon"=>$this->request->getVar('no_wa'),
			
		];
		$User->save($data);
		$result=[
			'type'		=>'successs',
			'message'	=>'Data '.$this->title.' Berhasil ditambahkan'
		];
		echo json_encode($result);
	}

	
}