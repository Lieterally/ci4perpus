<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Penerbit extends Model
{
    
    public function all_data()
    {
        return $this->db->table('tbl_penerbit')
            ->orderBy('id_penerbit', 'DESC')
            ->get()
            ->getResultArray();

    }

    public function add($data)
    {
        $this->db->table('tbl_penerbit')->insert($data);
    }
    
    public function edit($data)
    {
        $this->db->table('tbl_penerbit')->where('id_penerbit', $data['id_penerbit'])->update($data);
    }

    public function remove($data)
    {
        $this->db->table('tbl_penerbit')->where('id_penerbit', $data['id_penerbit'])->delete($data);
    }
}