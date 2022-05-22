<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Buku extends Model
{
    protected $table = 'tbl_user';
    protected $useTimestamps = true;
    protected $createdField  = 'created_date';
    protected $updatedField = 'updated_date';
    
    public function all_data()
    {
        return $this->db->table('tbl_buku')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
            ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
            ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
            ->orderBy('id_buku', 'DESC')
            ->get()
            ->getResultArray();

    }

    public function edit_data($id_buku)
    {
        return $this->db->table('tbl_buku')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
        ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
        ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
        ->where('id_buku', $id_buku)->get()->getRowArray();

    }

    

    public function add($data)
    {

        $this->db->table('tbl_buku')->insert($data);
    }

    public function remove($data)
    {
        $this->db->table('tbl_buku')->where('id_buku', $data['id_buku'])->delete($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_buku')->where('id_buku', $data['id_buku'])->update($data);
    }

    public function countbuku()
    {
        return $this->db->table('tbl_buku')->countAll();
        
    }
}