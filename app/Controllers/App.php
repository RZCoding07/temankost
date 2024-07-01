<?php namespace App\Controllers;


class App extends BaseController
{
protected $title="Pemilik";
	protected $base="Admin/Pemilik";
	public function index()
	{
		
		$data=[
			'title'=>'Home',
			
		];
		return view('user/dashboard/index',$data);
		
	}
	
	//--------------------------------------------------------------------

}
