<?php


namespace App\Controllers;
use CodeIgniter\I18n\Time;
use App\Models\Model_Buku;
use App\Models\Model_Penerbit;
use App\Models\Model_Kategori;
use App\Models\Model_Rak;
use App\Models\Model_Peminjaman;

class Buku extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Model_Buku = new Model_Buku();
        $this->Model_Penerbit = new Model_Penerbit();
        $this->Model_Kategori = new Model_Kategori();
        $this->Model_Rak = new Model_Rak();
        $this->Model_Peminjaman = new Model_Peminjaman();
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Buku',
            'buku' =>  $this->Model_Buku->all_data(),
            'peminjaman' => $this->Model_Peminjaman,
            'isi' => 'buku/v_index_buku',

        );
        return view('layout/v_wrapper', $data);
    }
    

    public function add() 
    {
        
        $data = array(
            'title' => 'Tambah Buku',
            'penerbit' => $this->Model_Penerbit->all_data(),
            'kategori' => $this->Model_Kategori->all_data(),
            'rak' => $this->Model_Rak->all_data(),
            'isi' => 'buku/v_add_buku',
            'validation' => \Config\Services::validation()  
        );
        return view('layout/v_wrapper', $data);

    }

    public function insert()
    {
        if ($this->validate([
            'isbn_buku' => ['rules' => 'required|is_unique[tbl_buku.isbn_buku]','errors' => [
                    'required' => 'ISBN harus diisi',
                    'is_unique' => 'ISBN sudah terdaftar',
                ],
            ],
            'judul_buku' => ['rules' => 'required','errors' => [
                    'required' => 'Judul harus diisi',
                ],
            ],
            'id_penerbit' => ['rules' => 'required','errors' => [
                    'required' => 'Penerbit harus diisi',
                ],
            ],
            'pengarang_buku' => ['rules' => 'required','errors' => [
                    'required' => 'Pengarang harus diisi',
                ],
            ],
            'stok_buku' => ['rules' => 'required|integer','errors' => [
                    'required' => 'Stok harus diisi',
                    'integer' => 'Stok harus berupa angka',
                ],
            ],
            'id_rak' => ['rules' => 'required','errors' => [
                    'required' => 'Rak harus diisi',
                ],
            ],
            'sampul_buku' => ['rules' => 'max_size[sampul_buku, 1024]|is_image[sampul_buku]|mime_in[sampul_buku,image/jpg,image/jpeg,image/png]','errors' => [
                'max_size' => 'Ukuran file harus kurang dari 1 mb',
                'is_image' => 'File harus berupa gambar',
                'mime_in' => 'File harus berupa gambar',
                ]
            ],

        ]))
        {
            
            //jika valid

            $file_sampul = $this->request->getFile('sampul_buku');

            //periksa jika foto diupload atau tidak

            if ($file_sampul->getError()==4) {
                $nama_sampul = 'default_sampul.jpg';
            } else {
                
                $file_sampul->move('img/sampul');
    
                $nama_sampul = $file_sampul->getName();
            }

            $data = array(
                'isbn_buku' => $this->request->getPost('isbn_buku'),
                'judul_buku' => $this->request->getPost('judul_buku'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'stok_buku' => $this->request->getPost('stok_buku'),
                'id_rak' => $this->request->getPost('id_rak'),
                'sampul_buku' => $nama_sampul,
                'created_date' => Time::today(),
                'updated_date' => Time::today(),
            );

            $data1 = array(
                'isbn_buku' => $this->request->getPost('isbn_buku'),
                'judul_buku' => $this->request->getPost('judul_buku'),
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                'stok_buku' => $this->request->getPost('stok_buku'),
                'id_rak' => $this->request->getPost('id_rak'),
                'sampul_buku' => $nama_sampul,
                'created_date' => Time::today(),
                'updated_date' => Time::today(),
            );

            if ($this->request->getPost('id_kategori') == '') {
                $this->Model_Buku->add($data1);
                session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
                return redirect()->to(base_url('Buku'));
            } else {
                $this->Model_Buku->add($data);
                session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
                return redirect()->to(base_url('Buku'));
            }

            
        } else {
            //jika tidak valid
            
            // $validation = \Config\Services::validation();
            // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/Buku/add'))->withInput();
            
        }
        
    }

    public function remove($id_buku)
    {

        $buku = $this->Model_Buku->edit_data($id_buku);
        $nama_sampul = $buku['sampul_buku'];
        
        $data = array(
            'id_buku' => $id_buku,
        );

        if ($nama_sampul == 'default_sampul.jpg') {

            $this->Model_Buku->remove($data);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to(base_url('Buku'));
            
        } else {
            unlink('img/sampul/'.$buku['sampul_buku']);

            $this->Model_Buku->remove($data);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to(base_url('Buku'));
            
        }

        
    }

    public function edit($id_buku) 
    {
        
        $data = array(
            'title' => 'Edit Buku',
            'penerbit' => $this->Model_Penerbit->all_data(),
            'kategori' => $this->Model_Kategori->all_data(),
            'rak' => $this->Model_Rak->all_data(),
            'buku' => $this->Model_Buku->edit_data($id_buku),
            'isi' => 'buku/v_edit_buku',
            'validation' => \Config\Services::validation()
        );
        return view('layout/v_wrapper', $data);

    }

    public function update($id_buku)
    {

        $a = $this->Model_Buku->edit_data($id_buku);
        $isbn_input = $this->request->getVar('isbn_buku');

        if ($isbn_input != $a['isbn_buku']) {

            if ($this->validate([
                'isbn_buku' => ['rules' => 'required|is_unique[tbl_buku.isbn_buku]','errors' => [
                        'required' => 'ISBN harus diisi',
                        'is_unique' => 'ISBN sudah terdaftar',
                    ],
                ],
                'judul_buku' => ['rules' => 'required','errors' => [
                        'required' => 'Judul harus diisi',
                    ],
                ],
                'id_penerbit' => ['rules' => 'required','errors' => [
                        'required' => 'Penerbit harus diisi',
                    ],
                ],
                'pengarang_buku' => ['rules' => 'required','errors' => [
                        'required' => 'Pengarang harus diisi',
                    ],
                ],
                'stok_buku' => ['rules' => 'required|integer','errors' => [
                        'required' => 'Stok harus diisi',
                        'integer' => 'Stok harus berupa angka',
                    ],
                ],
                'id_rak' => ['rules' => 'required','errors' => [
                        'required' => 'Rak harus diisi',
                    ],
                ],
                'sampul_buku' => ['rules' => 'max_size[sampul_buku, 1024]|is_image[sampul_buku]|mime_in[sampul_buku,image/jpg,image/jpeg,image/png]','errors' => [
                    'max_size' => 'Ukuran file harus kurang dari 1 mb',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'File harus berupa gambar',
                    ]
                ],
    
            ]))
            {
                
                //jika valid
    
                $file_sampul = $this->request->getFile('sampul_buku');
    
                //periksa jika foto diupload atau tidak
                
    
                if ($file_sampul->getError()==4) {
                    $data = array(
                        'id_buku' => $id_buku,
                        'isbn_buku' => $this->request->getPost('isbn_buku'),
                        'judul_buku' => $this->request->getPost('judul_buku'),
                        'id_penerbit' => $this->request->getPost('id_penerbit'),
                        'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                        'id_kategori' => $this->request->getPost('id_kategori'),
                        'stok_buku' => $this->request->getPost('stok_buku'),
                        'id_rak' => $this->request->getPost('id_rak'),
                        'updated_date' => Time::today(),
                    );
        
                    $data1 = array(
                        'id_buku' => $id_buku,
                        'isbn_buku' => $this->request->getPost('isbn_buku'),
                        'judul_buku' => $this->request->getPost('judul_buku'),
                        'id_penerbit' => $this->request->getPost('id_penerbit'),
                        'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                        'stok_buku' => $this->request->getPost('stok_buku'),
                        'id_rak' => $this->request->getPost('id_rak'),
                        'updated_date' => Time::today(),
                    );
        
                    if ($this->request->getPost('id_kategori') == '') {
                        $this->Model_Buku->edit($data1);
                        session()->setFlashdata('pesan', 'Data berhasil ubah');
                        return redirect()->to(base_url('Buku'));
                    } else {
                        $this->Model_Buku->edit($data);
                        session()->setFlashdata('pesan', 'Data berhasil diubah');
                        return redirect()->to(base_url('Buku'));
                    }
                } else {
                    $buku = $this->Model_Buku->edit_data($id_buku);
                    if ($buku['sampul_buku'] != 'default_sampul.jpg') {
                        unlink('img/sampul/'.$buku['sampul_buku']);
                    }

                    $nama_sampul = $file_sampul->getName();

                    $data = array(
                        'id_buku' => $id_buku,
                        'isbn_buku' => $this->request->getPost('isbn_buku'),
                        'judul_buku' => $this->request->getPost('judul_buku'),
                        'id_penerbit' => $this->request->getPost('id_penerbit'),
                        'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                        'id_kategori' => $this->request->getPost('id_kategori'),
                        'stok_buku' => $this->request->getPost('stok_buku'),
                        'id_rak' => $this->request->getPost('id_rak'),
                        'sampul_buku' => $nama_sampul,
                        'updated_date' => Time::today(),
                    
                    );
        
                    $data1 = array(
                        'id_buku' => $id_buku,
                        'isbn_buku' => $this->request->getPost('isbn_buku'),
                        'judul_buku' => $this->request->getPost('judul_buku'),
                        'id_penerbit' => $this->request->getPost('id_penerbit'),
                        'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                        'stok_buku' => $this->request->getPost('stok_buku'),
                        'id_rak' => $this->request->getPost('id_rak'),
                        'sampul_buku' => $nama_sampul,
                        'updated_date' => Time::today(),
                    );

        
                    if ($this->request->getPost('id_kategori') == '') {
                        $file_sampul->move('img/sampul');
                        $this->Model_Buku->edit($data1);
                        session()->setFlashdata('pesan', 'Data berhasil ubah');
                        return redirect()->to(base_url('Buku'));
                    } else {
                        $file_sampul->move('img/sampul');
                        $this->Model_Buku->edit($data);
                        session()->setFlashdata('pesan', 'Data berhasil diubah');
                        return redirect()->to(base_url('Buku'));
                    }
                    
                }
    
    
                
            } else {
                //jika tidak valid
                
                // $validation = \Config\Services::validation();
                // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('/Buku/edit/'.$id_buku))->withInput();
                
            }


        } else {

            if ($this->validate([
                'isbn_buku' => ['rules' => 'required','errors' => [
                        'required' => 'ISBN harus diisi',
                        
                    ],
                ],
                'judul_buku' => ['rules' => 'required','errors' => [
                        'required' => 'Judul harus diisi',
                    ],
                ],
                'id_penerbit' => ['rules' => 'required','errors' => [
                        'required' => 'Penerbit harus diisi',
                    ],
                ],
                'pengarang_buku' => ['rules' => 'required','errors' => [
                        'required' => 'Pengarang harus diisi',
                    ],
                ],
                'stok_buku' => ['rules' => 'required|integer','errors' => [
                        'required' => 'Stok harus diisi',
                        'integer' => 'Stok harus berupa angka',
                    ],
                ],
                'id_rak' => ['rules' => 'required','errors' => [
                        'required' => 'Rak harus diisi',
                    ],
                ],
                'sampul_buku' => ['rules' => 'max_size[sampul_buku, 1024]|is_image[sampul_buku]|mime_in[sampul_buku,image/jpg,image/jpeg,image/png]','errors' => [
                    'max_size' => 'Ukuran file harus kurang dari 1 mb',
                    'is_image' => 'File harus berupa gambar',
                    'mime_in' => 'File harus berupa gambar',
                    ]
                ],
    
            ]))
            {
                
                //jika valid
    
                $file_sampul = $this->request->getFile('sampul_buku');
    
                //periksa jika foto diupload atau tidak
                
    
                if ($file_sampul->getError()==4) {
                    $data = array(
                        'id_buku' => $id_buku,
                        'isbn_buku' => $this->request->getPost('isbn_buku'),
                        'judul_buku' => $this->request->getPost('judul_buku'),
                        'id_penerbit' => $this->request->getPost('id_penerbit'),
                        'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                        'id_kategori' => $this->request->getPost('id_kategori'),
                        'stok_buku' => $this->request->getPost('stok_buku'),
                        'id_rak' => $this->request->getPost('id_rak'),
                        'updated_date' => Time::today(),
                    );
        
                    $data1 = array(
                        'id_buku' => $id_buku,
                        'isbn_buku' => $this->request->getPost('isbn_buku'),
                        'judul_buku' => $this->request->getPost('judul_buku'),
                        'id_penerbit' => $this->request->getPost('id_penerbit'),
                        'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                        'stok_buku' => $this->request->getPost('stok_buku'),
                        'id_rak' => $this->request->getPost('id_rak'),
                        'updated_date' => Time::today(),
                    );
        
                    if ($this->request->getPost('id_kategori') == '') {
                        $this->Model_Buku->edit($data1);
                        session()->setFlashdata('pesan', 'Data berhasil ubah');
                        return redirect()->to(base_url('Buku'));
                    } else {
                        $this->Model_Buku->edit($data);
                        session()->setFlashdata('pesan', 'Data berhasil diubah');
                        return redirect()->to(base_url('Buku'));
                    }
                } else {
                    $buku = $this->Model_Buku->edit_data($id_buku);
                    if ($buku['sampul_buku'] != 'default_sampul.jpg') {
                        unlink('img/sampul/'.$buku['sampul_buku']);
                    }

                    $nama_sampul = $file_sampul->getName();

                    $data = array(
                        'id_buku' => $id_buku,
                        'isbn_buku' => $this->request->getPost('isbn_buku'),
                        'judul_buku' => $this->request->getPost('judul_buku'),
                        'id_penerbit' => $this->request->getPost('id_penerbit'),
                        'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                        'id_kategori' => $this->request->getPost('id_kategori'),
                        'stok_buku' => $this->request->getPost('stok_buku'),
                        'id_rak' => $this->request->getPost('id_rak'),
                        'sampul_buku' => $nama_sampul,
                        'updated_date' => Time::today(),
                    
                    );
        
                    $data1 = array(
                        'id_buku' => $id_buku,
                        'isbn_buku' => $this->request->getPost('isbn_buku'),
                        'judul_buku' => $this->request->getPost('judul_buku'),
                        'id_penerbit' => $this->request->getPost('id_penerbit'),
                        'pengarang_buku' => $this->request->getPost('pengarang_buku'),
                        'stok_buku' => $this->request->getPost('stok_buku'),
                        'id_rak' => $this->request->getPost('id_rak'),
                        'sampul_buku' => $nama_sampul,
                        'updated_date' => Time::today(),
                    );

        
                    if ($this->request->getPost('id_kategori') == '') {
                        $file_sampul->move('img/sampul');
                        $this->Model_Buku->edit($data1);
                        session()->setFlashdata('pesan', 'Data berhasil ubah');
                        return redirect()->to(base_url('Buku'));
                    } else {
                        $file_sampul->move('img/sampul');
                        $this->Model_Buku->edit($data);
                        session()->setFlashdata('pesan', 'Data berhasil diubah');
                        return redirect()->to(base_url('Buku'));
                    }
                    
                }
    
    
                
            } else {
                //jika tidak valid
                
                // $validation = \Config\Services::validation();
                // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
                return redirect()->to(base_url('/Buku/edit/'.$id_buku))->withInput();
                
            }
            
        }

        

        
    }
}