<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Siswa extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_siswa')
            ->orderBy('id_siswa', 'DESC')
            ->get()
            ->getResultArray();

    }


    public function add($data)
    {
        $this->db->table('tbl_siswa')->insert($data);
    }

    public function remove($data)
    {
        $this->db->table('tbl_siswa')->where('id_siswa', $data['id_siswa'])->delete($data);
    }

    public function edit_data($id_siswa)
    {
        return $this->db->table('tbl_siswa')->where('id_siswa', $id_siswa)->get()->getRowArray();

    }
    public function count($id_siswa)
    {
        return $this->db->table('tbl_siswa')->where('id_siswa', $id_siswa)->countAllResults();

    }

    public function edit($data)
    {
        $this->db->table('tbl_siswa')->where('id_siswa', $data['id_siswa'])->update($data);
    }

    public function countsiswa()
    {
        return $this->db->table('tbl_siswa')->countAll();
        
    }



    
}