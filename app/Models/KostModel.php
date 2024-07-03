<?php

namespace App\Models;

use App\Controllers\Admin\Kost;
use CodeIgniter\Model;

class KostModel extends Model
{
  protected $table      = 'kost';
  protected $primaryKey = 'id';

  protected $returnType = 'array';

  protected $allowedFields = [
    'nama',
    'id_pemilik',
    'jumlah_kamar',
    'terisi',
    'fasilitas',
    'peraturan',
    'alamat',
    'kordinat',
    'harga',
    'jenis',
  ];
  protected $useSoftDeletes = true;
  protected $useTimestamps = true;
  protected $createdField  = 'create_at';
  protected $updatedField  = 'update_at';
  protected $deletedField  = 'delete_at';

  public static function getData()
  {
    $db = db_connect();
    $builder = $db->table('kost')
      ->select('kost.*, pengguna.nama as nmpemilik, pengguna.telepon, pengguna.email, foto.foto')
      ->join('pengguna', 'pengguna.id = kost.id_pemilik', 'left')
      ->join('foto', 'foto.id_kost = kost.id', 'left')
      ->where('kost.delete_at', null);
    
    return $builder;
  }

  public function getAll() {
    $data =  KostModel::getData()
        ->groupBy('kost.id, foto.foto')
        ->distinct('foto.foto')
        ->get()
        ->getResultArray();
        return [$data[0]];
}
  public function getSearch($q)
  {
    return KostModel::getData()
      ->like('kost.nama', $q)
      ->orLike('kost.alamat', $q)
      ->orLike('kost.jenis', $q)
      ->orLike('kost.fasilitas', $q)
      ->orLike('kost.peraturan', $q)
      ->orLike('kost.harga', $q)
      ->groupBy('kost.id, foto.foto')
      ->get()
      ->getResultArray();
  }

  public function getFilter($min, $max)
  {
      // Pastikan $min dan $max adalah numerik
      $min = (int) $min;
      $max = (int) $max;
  
      // Pastikan operator perbandingan yang benar digunakan
      return KostModel::getData()
          ->where('kost.harga >=', $min)
          ->where('kost.harga <=', $max)
          ->groupBy('kost.id, foto.foto')
          ->get()
          ->getResultArray();
  }
  


  public function favorit($id_user, $id_kost = null)
  {
    $builder = $this->db->table('favorit')->where('id_user', $id_user);
    if ($id_kost) {
      return $builder->where('id_kost', $id_kost)->get()->getNumRows();
    }
    return $builder->join('kost', 'favorit.id_kost=kost.id')
      ->join('foto', 'foto.id_kost=kost.id', 'left')
      ->groupBy('kost.id, foto.foto')
      ->get()
      ->getResultArray();
  }


  public function getMy($id)
  {
    return $this->db->table('kost')
      ->select('kost.*,pengguna.nama as nmpemilik,pengguna.telepon,pengguna.email')
      ->join('pengguna', 'pengguna.id=kost.id_pemilik')
      ->where('kost.delete_at', null)
      ->where('kost.id_pemilik', $id)
      ->get()->getResultArray();
  }
}
