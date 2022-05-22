<?php

namespace App\Models;

use CodeIgniter\Model;

class Model_Peminjaman extends Model
{
    public function all_data()
    {
        return $this->db->table('tbl_peminjaman')
            ->join('tbl_buku', 'tbl_buku.id_buku = tbl_peminjaman.id_buku', 'left')
            ->join('tbl_siswa', 'tbl_siswa.id_siswa = tbl_peminjaman.id_siswa', 'left')
            ->orderBy('id_peminjaman', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_peminjaman')->insert($data);
    }

    public function countpinjam($id_buku)
    {
        return $this->db->table('tbl_peminjaman')->where('id_buku', $id_buku)->where('status_peminjaman', 'Dipinjam')->countAllResults();
        
    }
    public function counttotkembali()
    {
        return $this->db->table('tbl_peminjaman')->where('status_peminjaman', 'Dikembalikan')->countAllResults();
        
    }
    public function counttotpinjam()
    {
        return $this->db->table('tbl_peminjaman')->where('status_peminjaman', 'Dipinjam')->countAllResults();
        
    }

    public function remove($data)
    {
        $this->db->table('tbl_peminjaman')->where('id_peminjaman', $data['id_peminjaman'])->delete($data);
    }

    public function edit_data($id_peminjaman)
    {
        return $this->db->table('tbl_peminjaman')->where('id_peminjaman', $id_peminjaman)->get()->getRowArray();

    }

    public function count($id_siswa)
    {
        return $this->db->table('tbl_siswa')->where('id_siswa', $id_siswa)->countAllResults();

    }

    public function kembali($data)
    {
        $this->db->table('tbl_peminjaman')->where('id_peminjaman', $data['id_peminjaman'])->update($data);
    }
    
}