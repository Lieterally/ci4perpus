<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_User extends Model
{
    protected $table = 'tbl_user';
    
    public function all_data()
    {
        return $this->db->table('tbl_user')
            ->orderBy('id_user', 'DESC')
            ->get()
            ->getResultArray();

    }

    public function edit_data($id_user)
    {
        return $this->db->table('tbl_user')->where('id_user', $id_user)->get()->getRowArray();

    }
    public function usname($id_user)
    {

        return $this->where('id_user', $id_user)->findColumn('username_user');
        
    }

    public function add($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function remove($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->delete($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_user')->where('id_user', $data['id_user'])->update($data);
    }
}