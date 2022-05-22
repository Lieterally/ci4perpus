<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\Model_Buku;
use App\Models\Model_Siswa;
use App\Models\Model_Peminjaman;

class Pengembalian extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_Peminjaman = new Model_Peminjaman();
        $this->Model_Buku = new Model_Buku();
        $this->Model_Siswa = new Model_Siswa();

    }

    public function index()
    {

        $data = array(
            'title' => 'Data Pengembalian',
            'peminjaman' =>  $this->Model_Peminjaman->all_data(),
            'isi' => 'pengembalian/v_index_pengembalian',

        );
        return view('layout/v_wrapper', $data);
    }

    public function remove($id_peminjaman)
    {

        $data = array(
            'id_peminjaman' => $id_peminjaman,
        );

        $this->Model_Peminjaman->remove($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('Pengembalian'));
        
    }
}