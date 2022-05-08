<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_User extends Model
{
    
    public function all_data()
    {
        return $this->db->table('tbl_user')
            ->orderBy('id_user', 'DESC')
            ->get()
            ->getResultArray();

    }
}