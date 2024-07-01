<?php
namespace App\Models;
use CodeIgniter\Model;

class PembayaranModel extends Model {
    
	protected $table = 'pembayaran';
	protected $primaryKey = 'id';
	protected $returnType = 'object';
	protected $useSoftDeletes = false;
	protected $allowedFields = ['user_id', 'kost_id', 'bulan', 'created_at', 'updated_at'];
	protected $useTimestamps = true;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $validationRules    = [];
	protected $validationMessages = [];
	protected $skipValidation     = true;    
	
}