<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Mahasiswa_Model extends Model {
 
    protected $table = 'Mahasiswa';
 
    public function getMahasiswa($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['id_Mahasiswa' => $id])->getRowArray();
        }  
    }
     
    public function insertMahasiswa($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
 
    public function updateMahasiswa($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['id_Mahasiswa' => $id]);
    }
 
    public function deleteMahasiswa($id)
    {
        return $this->db->table($this->table)->delete(['id_Mahasiswa' => $id]);
    }
} 