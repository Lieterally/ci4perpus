<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Rak extends Model
{
    
    public function all_data()
    {
        return $this->db->table('tbl_rak')
            ->orderBy('id_rak', 'DESC')
            ->get()
            ->getResultArray();

    }

    public function add($data)
    {
        $this->db->table('tbl_rak')->insert($data);
    }
    
    public function edit($data)
    {
        $this->db->table('tbl_rak')->where('id_rak', $data['id_rak'])->update($data);
    }

    public function remove($data)
    {
        $this->db->table('tbl_rak')->where('id_rak', $data['id_rak'])->delete($data);
    }
}