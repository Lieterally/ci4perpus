<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Landing extends Model
{
    protected $table = 'tbl_user';
    protected $useTimestamps = true;
    protected $createdField  = 'created_date';
    protected $updatedField = 'updated_date';
    
    public function data_buku()
    {
        return $this->db->table('tbl_buku')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->orderBy('id_buku', 'DESC')
            ->get()
            ->getResultArray();
    }
}