<?php

namespace App\Controllers;
use App\Models\Model_Rak;

class Rak extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Model_Rak = new Model_Rak();
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Data Rak',
            'rak' =>  $this->Model_Rak->all_data(),
            'isi' => 'v_rak',

        );
        return view('layout/v_wrapper', $data);
    }
    

    public function insert()
    {

        $data = array('nama_rak' => $this->request->getPost('nama_rak'));
        $this->Model_Rak->add($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Rak'));

        
    }

    public function edit($id_rak)
    {

        $data = array(
            'id_rak' => $id_rak,
            'nama_rak' => $this->request->getPost('nama_rak'),
        );
        $this->Model_Rak->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('Rak'));

        
    }
    
    public function remove($id_rak)
    {

        $data = array(
            'id_rak' => $id_rak,
        );
        $this->Model_Rak->remove($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('Rak'));
        
    }


}