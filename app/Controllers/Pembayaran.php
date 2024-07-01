<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\PembayaranModel;

class Pembayaran extends BaseController
{
	
    protected $pembayaranModel;
    protected $validation;
	
	public function __construct()
	{
	    $this->pembayaranModel = new PembayaranModel();
       	$this->validation =  \Config\Services::validation();
		
	}
	
	public function index()
	{

	    $data = [
                'controller'    	=> ucwords('pembayaran'),
                'title'     		=> ucwords('pembayaran')				
			];
		
		return view('pembayaran', $data);
			
	}

	public function getAll()
	{
 		$response = $data['data'] = array();	

		$result = $this->pembayaranModel->select()->findAll();
		$no = 1;
		foreach ($result as $key => $value) {	
			$ops = '<div class="btn-group text-white">';
			$ops .= '<a class="btn btn-dark" onClick="save(' . $value->id . ')"><i class="fas fa-pencil-alt"></i></a>';
			$ops .= '<a class="btn btn-secondary text-dark" onClick="remove(' . $value->id . ')"><i class="fas fa-trash-alt"></i></a>';
			$ops .= '</div>';
			$data['data'][$key] = array(
				$no,
				$value->user_id,
$value->kost_id,
$value->bulan,
$value->created_at,
$value->updated_at,

				$ops				
			);
			$no++;
		} 

		return $this->response->setJSON($data);		
	}
	
	public function getOne()
	{
 		$response = array();
		
		$id = $this->request->getPost('id');
		
		if ($this->validation->check($id, 'required|numeric')) {
			
			$data = $this->pembayaranModel->where('id' ,$id)->first();
			
			return $this->response->setJSON($data);	
				
		} else {
			throw new \CodeIgniter\Exceptions\PageNotFoundException();
		}	
		
	}	

	public function add()
	{
        $response = array();

		$fields['id'] = $this->request->getPost('id');
$fields['user_id'] = $this->request->getPost('user_id');
$fields['kost_id'] = $this->request->getPost('kost_id');
$fields['bulan'] = $this->request->getPost('bulan');
$fields['created_at'] = $this->request->getPost('created_at');
$fields['updated_at'] = $this->request->getPost('updated_at');


        $this->validation->setRules([
			            'user_id' => ['label' => 'User id', 'rules' => 'required|numeric|min_length[0]'],
            'kost_id' => ['label' => 'Kost id', 'rules' => 'required|numeric|min_length[0]'],
            'bulan' => ['label' => 'Bulan', 'rules' => 'required|numeric|min_length[0]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'permit_empty|valid_date|min_length[0]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form
			
        } else {

            if ($this->pembayaranModel->insert($fields)) {
												
                $response['success'] = true;
                $response['messages'] = lang("App.insert-success") ;	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.insert-error") ;
				
            }
        }
		
        return $this->response->setJSON($response);
	}

	public function edit()
	{
        $response = array();
		
		$fields['id'] = $this->request->getPost('id');
$fields['user_id'] = $this->request->getPost('user_id');
$fields['kost_id'] = $this->request->getPost('kost_id');
$fields['bulan'] = $this->request->getPost('bulan');
$fields['created_at'] = $this->request->getPost('created_at');
$fields['updated_at'] = $this->request->getPost('updated_at');


        $this->validation->setRules([
			            'user_id' => ['label' => 'User id', 'rules' => 'required|numeric|min_length[0]'],
            'kost_id' => ['label' => 'Kost id', 'rules' => 'required|numeric|min_length[0]'],
            'bulan' => ['label' => 'Bulan', 'rules' => 'required|numeric|min_length[0]'],
            'created_at' => ['label' => 'Created at', 'rules' => 'permit_empty|valid_date|min_length[0]'],
            'updated_at' => ['label' => 'Updated at', 'rules' => 'permit_empty|valid_date|min_length[0]'],

        ]);

        if ($this->validation->run($fields) == FALSE) {

            $response['success'] = false;
			$response['messages'] = $this->validation->getErrors();//Show Error in Input Form

        } else {

            if ($this->pembayaranModel->update($fields['id'], $fields)) {
				
                $response['success'] = true;
                $response['messages'] = lang("App.update-success");	
				
            } else {
				
                $response['success'] = false;
                $response['messages'] = lang("App.update-error");
				
            }
        }
		
        return $this->response->setJSON($response);	
	}
	
	public function remove()
	{
		$response = array();
		
		$id = $this->request->getPost('id');
		
		if (!$this->validation->check($id, 'required|numeric')) {

			throw new \CodeIgniter\Exceptions\PageNotFoundException();
			
		} else {	
		
			if ($this->pembayaranModel->where('id', $id)->delete()) {
								
				$response['success'] = true;
				$response['messages'] = lang("App.delete-success");	
				
			} else {
				
				$response['success'] = false;
				$response['messages'] = lang("App.delete-error");
				
			}
		}	
	
        return $this->response->setJSON($response);		
	}	
		
}	
