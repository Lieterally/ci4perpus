<?php

namespace App\Controllers;
use App\Models\Model_Penerbit;

class Penerbit extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Model_Penerbit = new Model_Penerbit();
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Data Penerbit',
            'penerbit' =>  $this->Model_Penerbit->all_data(),
            'isi' => 'v_penerbit',

        );
        return view('layout/v_wrapper', $data);
    }
    

    public function insert()
    {

        $data = array('nama_penerbit' => $this->request->getPost('nama_penerbit'));
        $this->Model_Penerbit->add($data);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('Penerbit'));

        
    }

    public function edit($id_penerbit)
    {

        $data = array(
            'id_penerbit' => $id_penerbit,
            'nama_penerbit' => $this->request->getPost('nama_penerbit'),
        );
        $this->Model_Penerbit->edit($data);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to(base_url('Penerbit'));

        
    }
    
    public function remove($id_penerbit)
    {

        $data = array(
            'id_penerbit' => $id_penerbit,
        );
        $this->Model_Penerbit->remove($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('Penerbit'));
        
    }


}