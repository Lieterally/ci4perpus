<?php

namespace App\Controllers;
use App\Models\Model_Siswa;
use App\Models\Model_Buku;
use App\Models\Model_Peminjaman;

class Dashboard extends BaseController
{

    public function __construct()
    {
        $this->Model_Siswa = new Model_Siswa();
        $this->Model_Buku = new Model_Buku();
        $this->Model_Peminjaman = new Model_Peminjaman();
    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'siswa' => $this->Model_Siswa,
            'buku' => $this->Model_Buku,
            'peminjaman' => $this->Model_Peminjaman,
            'isi' => 'v_home',

        );
        return view('layout/v_wrapper', $data);
    }
}