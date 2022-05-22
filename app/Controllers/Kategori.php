<?php

namespace App\Controllers;
use App\Models\Model_Kategori;

class Kategori extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Model_Kategori = new Model_Kategori();
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Data Kategori',
            'kategori' =>  $this->Model_Kategori->all_data(),
            'isi' => 'v_kategori',

        );
        return view('layout/v_wrapper', $data);
    }
    
    public function add() 
    {
        $data = array(
            'title' => 'Tambah Administrator',
            'isi' => 'user/v_add_user',
            
            
        );
        return view('layout/v_wrapper', $data);

    }

    public function insert()
    {

        $data = array('nama_kategori' => $this->request->getPost('nama_kategori'));
        $this->Model_Kategori->add($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Kategori'));

        
    }

    public function edit($id_kategori)
    {

        $data = array(
            'id_kategori' => $id_kategori,
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        );
        $this->Model_Kategori->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('Kategori'));

        
    }
    
    public function remove($id_kategori)
    {

        $data = array(
            'id_kategori' => $id_kategori,
        );
        $this->Model_Kategori->remove($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('Kategori'));
        
    }


}