<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Auth extends Model
{
    public function login($username, $password)
    {
        return $this->db->table('tbl_user')->where([
            'username_user' => $username,
            'password_user' => MD5($password),
        ])->get()->getRowArray();
    }
}