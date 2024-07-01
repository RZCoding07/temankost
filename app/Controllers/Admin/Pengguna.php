<?php namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PenggunaModel;

class Pengguna extends BaseController
{
	protected $title="Pengguna";
	protected $base="Admin/Pengguna";
		

	public function index()
	{
		$data=[
			"title" =>$this->title,
      "base"  =>$this->base
		];
		return view('admin/pengguna/index',$data);
	}
	public function table()
	{
		$Pengguna=new PenggunaModel;
		$data=[

			"Pengguna"	=>$Pengguna->findAll()
		];
		return view('admin/pengguna/table',$data);
	}
	
		public function formEdit($id)
	{
		$User=new PenggunaModel;
		$id=$this->request->getVar('id');
		$data=[
			"title"	=>$this->title,
			"data"=>$User->find($id)
		];
		return view('admin/pengguna/formEdit',$data);

	}
		public function delete()
	{
		
		if ($this->request->isAJAX()) {
			$User=new PenggunaModel;
			$id=$this->request->getVar('id');
			$User->delete($id);
			$result=[
				'type'		=>'success',
			];
			
			echo json_encode($result);
		}
		else{
			echo "Access Denide!!";
		}
		

	}
	
	
	
	
	
	
	
	
	//==============================================================================
	
	
	public function apah($id)
	{
		$User=new PenggunaModel;
		$data=[
			"title"	=>$this->title,
			"data"=>$User->find($id)
		];
		return view('admin/pengguna/apah',$data);

	}
	
	
	
	
	
	public function update()
	{

		$User=new PenggunaModel;
		$data=[
			"id"=>$this->request->getVar('id'),
			"name"=>$this->request->getVar('name'),
			"password"=>$this->request->getVar('password'),
			"email"=>$this->request->getVar('email'),
			"pemilik"=>$this->request->getVar('pemilik'),
			"telepon"=>$this->request->getVar('telepon'),
		];
		$User->save($data);
		$result=[
			'type'		=>'successs',
			'message'	=>'Data '.$this->title.' Berhasil di Edit'
		];
		
		echo json_encode($result);

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

}