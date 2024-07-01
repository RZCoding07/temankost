<?php 
namespace App\Models;

use CodeIgniter\Model;
class PermintaanModel extends Model{
      protected $table      = 'permintaan';
    protected $primaryKey = 'id';

    protected $returnType = 'array';

 

    
    function __construct(){
        $this->db = db_connect();
    }
    function tampildata(){
        return $this->db->table('permintaan')->get();
    }
}

//hary//

//hary//

 

//starrt hary//

//end hary