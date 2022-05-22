<?php

namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\Model_Buku;
use App\Models\Model_Siswa;
use App\Models\Model_Peminjaman;

class Peminjaman extends BaseController
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
            'title' => 'Data Peminjaman',
            'peminjaman' =>  $this->Model_Peminjaman->all_data(),
            'isi' => 'peminjaman/v_index_peminjaman',

        );
        return view('layout/v_wrapper', $data);
    }

    public function add() 
    {
        
        $data = array(
            'title' => 'Tambah Peminjaman',
            'buku' => $this->Model_Buku->all_data(),
            'siswa' => $this->Model_Siswa->all_data(),
            'isi' => 'peminjaman/v_add_peminjaman',
            'validation' => \Config\Services::validation()  
        );
        return view('layout/v_wrapper', $data);

    }

    public function insert()
    {
        if ($this->validate([
            'no_peminjaman' => ['rules' => 'required','errors' => [
                    'required' => 'Nomor peminjaman harus diisi',
                ],
            ],
            'id_siswa' => ['rules' => 'required','errors' => [
                    'required' => 'Nama siswa harus diisi',
                ],
            ],
            'id_buku' => ['rules' => 'required','errors' => [
                    'required' => 'Judul buku harus diisi',
                ],
            ],
            'tanggal_peminjaman' => ['rules' => 'required','errors' => [
                    'required' => 'Tanggal peminjaman harus diisi',
                ],
            ],
            'durasi_peminjaman' => ['rules' => 'integer','errors' => [
                    'integer' => 'Durasi harus berupa angka',
                ],
            ],
            

        ])) {
            
            //jika valid
            
            $durasi =$this->request->getVar('durasi_peminjaman');

            $tgl = $this->request->getVar('tanggal_peminjaman');
            $convtgl = date('Y-m-d', strtotime($tgl));
            $tglkembali = date( "Y-m-d", strtotime( "$convtgl +".$durasi. "day" ));

            $data = array(
                'no_peminjaman' => $this->request->getPost('no_peminjaman'),
                'id_siswa' => $this->request->getPost('id_siswa'),
                'id_buku' => $this->request->getPost('id_buku'),
                'tanggal_peminjaman' => $convtgl,
                'tanggal_pengembalian' => $tglkembali,
                'durasi_peminjaman' => $this->request->getPost('durasi_peminjaman'),
            );

            $this->Model_Peminjaman->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('Peminjaman'));
            
        } else {
            //jika tidak valid
            
            // $validation = \Config\Services::validation();
            // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/Peminjaman/add'))->withInput();
        }
    }

    public function remove($id_peminjaman)
    {

        $data = array(
            'id_peminjaman' => $id_peminjaman,
        );

        $this->Model_Peminjaman->remove($data);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to(base_url('Peminjaman'));
        
    }
    
    public function kembali($id_peminjaman)
    {


        $tgldikembalikan = date('Y-m-d');


        $data = array(
            'id_peminjaman' => $id_peminjaman,
            'status_peminjaman' => 'Dikembalikan',
            'tanggal_dikembalikan' => $tgldikembalikan,
        );

        $this->Model_Peminjaman->kembali($data);
        session()->setFlashdata('pesan', 'Peminjaman selesai');
        return redirect()->to(base_url('Peminjaman'));
        
    }
    
}