<?php

namespace App\Controllers;
use App\Models\Model_User;

class User extends BaseController
{

    public function __construct()
    {
        helper('form');
        $this->Model_User = new Model_User();
    }
    
    public function index()
    {
        $data = array(
            'title' => 'Data Administrator',
            'user' =>  $this->Model_User->all_data(),
            'isi' => 'user/v_index_user',

        );
        return view('layout/v_wrapper', $data);
    }
    
    public function add() 
    {
        
        $data = array(
            'title' => 'Tambah Administrator',
            'isi' => 'user/v_add_user',
            'validation' => \Config\Services::validation()  
        );
        return view('layout/v_wrapper', $data);

    }



    public function insert()
    {
        if ($this->validate([
            'nama_user' => ['rules' => 'required|is_unique[tbl_user.nama_user]','errors' => [
                    'required' => 'Nama harus diisi',
                    'is_unique' => 'Nama sudah terdaftar',
                ],
            ],
            'username_user' => ['rules' => 'required|is_unique[tbl_user.username_user]','errors' => [
                    'required' => 'Username harus diisi',
                    'is_unique' => 'Username sudah terdaftar',
                ],
            ],
            'password_user' => ['rules' => 'required|matches[konfirmpassword]','errors' => [
                    'required' => 'Password harus diisi',
                    'matches' => 'Password tidak sama'
                ],
            ],
            'email_user' => ['rules' => 'required','errors' => [
                    'required' => 'Email harus diisi',
                ],
            ],
            'telp_user' => ['rules' => 'required','errors' => [
                    'required' => 'Nomor telepon harus diisi',
                ],
            ],
            'foto_user' => ['rules' => 'max_size[foto_user, 1024]|is_image[foto_user]|mime_in[foto_user,image/jpg,image/jpeg,image/png]','errors' => [
                'max_size' => 'Ukuran file harus kurang dari 1 mb',
                'is_image' => 'File harus berupa gambar',
                'mime_in' => 'File harus berupa gambar',
                ]
            ],

        ]))
        {
            
            //jika valid

            $pwcrypted = $this->request->getPost('password_user');

            $file_foto = $this->request->getFile('foto_user');

            //periksa jika foto diupload atau tidak

            if ($file_foto->getError()==4) {
                $nama_foto = 'default.png';
            } else {
                
                $file_foto->move('img');
    
                $nama_foto = $file_foto->getName();
            }


            $password = MD5('password_user');
            $data = array(
                'nama_user' => $this->request->getPost('nama_user'),
                'username_user' => $this->request->getPost('username_user'),
                'password_user' => md5($pwcrypted),
                'email_user' => $this->request->getPost('email_user'),
                'telp_user' => $this->request->getPost('telp_user'),
                'foto_user' => $nama_foto,
            );
            $this->Model_User->add($data);
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->to(base_url('User'));

            
        } else {
            //jika tidak valid
            
            // $validation = \Config\Services::validation();
            // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/User/add'))->withInput();
            
        }
        
    }

    public function remove($id_user)
    {

        $user = $this->Model_User->edit_data($id_user);
        $nama_foto = $user['foto_user'];

        $data = array(
            'id_user' => $id_user,
        );

        if ($nama_foto == 'default.png') {

            $this->Model_User->remove($data);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to(base_url('User'));
            
        } else {
            unlink('img/'.$user['foto_user']);

            $this->Model_User->remove($data);
            session()->setFlashdata('pesan', 'Data berhasil dihapus');
            return redirect()->to(base_url('User'));
            
        }

        
    }

    public function edit($id_user) 
    {
        
        $data = array(
            'title' => 'Edit Administrator',
            'user' => $this->Model_User->edit_data($id_user),
            'isi' => 'user/v_edit_user',
            'validation' => \Config\Services::validation()
        );
        return view('layout/v_wrapper', $data);

    }

    public function update_profil($id_user)
    {
        if ($this->validate([
            'nama_user' => ['rules' => 'required','errors' => [
                    'required' => 'Nama harus diisi',
                ],
            ],

            'email_user' => ['rules' => 'required','errors' => [
                    'required' => 'Email harus diisi',
                ],
            ],
            'telp_user' => ['rules' => 'required','errors' => [
                    'required' => 'Nomor telepon harus diisi',
                ],
            ],
            'foto_user' => ['rules' => 'max_size[foto_user, 1024]|is_image[foto_user]|mime_in[foto_user,image/jpg,image/jpeg,image/png]','errors' => [
                'max_size' => 'Ukuran file harus kurang dari 1 mb',
                'is_image' => 'File harus berupa gambar',
                'mime_in' => 'File harus berupa gambar',
                ]
            ],

        ]))
        {
            $file_foto = $this->request->getFile('foto_user');
            if ($file_foto->getError()==4) {
                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email_user' => $this->request->getPost('email_user'),
                    'telp_user' => $this->request->getPost('telp_user'),
                );
                $this->Model_User->edit($data);
            } else {
                $user = $this->Model_User->edit_data($id_user);
                if ($user['foto_user'] != 'default.png') {
                    unlink('img/'.$user['foto_user']);
                }
                $nama_foto = $file_foto->getName();

                $data = array(
                    'id_user' => $id_user,
                    'nama_user' => $this->request->getPost('nama_user'),
                    'email_user' => $this->request->getPost('email_user'),
                    'telp_user' => $this->request->getPost('telp_user'),
                    'foto_user' => $nama_foto,
                );
                $file_foto->move('img');
                $this->Model_User->edit($data);
                
    
                
            }
            
            //jika valid

            $pwcrypted = $this->request->getPost('password_user');

            

            //periksa jika foto diupload atau tidak

            // if ($file_foto->getError()==4) {
            //     $nama_foto = 'default.png';
            // } else {
                
            //     $file_foto->move('img');
    
            //     $nama_foto = $file_foto->getName();
            // }



            session()->setFlashdata('pesan', 'Data berhasil diupdate');
            // return redirect()->to(base_url('User'));
            return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();

            
        } else {
            //jika tidak valid
            
            // $validation = \Config\Services::validation();
            // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();
        }
    }
    
    public function update_akun($id_user)
    {
       
        $a = $this->Model_User->edit_data($id_user);
        $username_input = $this->request->getVar('username_user');
        $password_input = $this->request->getVar('password_user');
        
        if ($username_input != $a['username_user']) {
            if ($password_input == '') {

                if ($this->validate([
                    'username_user' => ['rules' => 'required|is_unique[tbl_user.username_user]','errors' => [
                        'required' => 'Username harus diisi',
                        'is_unique' => 'Username sudah terdaftar',
                    ],
                ],
        
                ]))
                {
                    //jika valid
        
                    $data = array(
                        'id_user' => $id_user,
                        'username_user' => $this->request->getPost('username_user'),
                    );
                    $this->Model_User->edit($data);
                    session()->setFlashdata('pesan1', 'Data berhasil diupdate');
                    // return redirect()->to(base_url('User'));
                    return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();
        
                    
                } else {
                    //jika tidak valid
                    
                    // $validation = \Config\Services::validation();
                    // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
                    return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();
                }
            } else {

                if ($this->validate([
                    'username_user' => ['rules' => 'required|is_unique[tbl_user.username_user]','errors' => [
                        'required' => 'Username harus diisi',
                        'is_unique' => 'Username sudah terdaftar',
                    ],
                ],
                    'password_user' => ['rules' => 'required|matches[konfirmpassword]','errors' => [
                            'required' => 'Password harus diisi',
                            'matches' => 'Password tidak sama'
                        ],
                    ],
        
                ]))
                {
                    
                    //jika valid
        
                    $pwcrypted = $this->request->getPost('password_user');
        
                    $data = array(
                        'id_user' => $id_user,
                        'username_user' => $this->request->getPost('username_user'),
                        'password_user' => md5($pwcrypted),
                    );
                    $this->Model_User->edit($data);
                    session()->setFlashdata('pesan1', 'Data berhasil diupdate');
                    // return redirect()->to(base_url('User'));
                    return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();
        
                    
                } else {
                    //jika tidak valid
                    
                    // $validation = \Config\Services::validation();
                    // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
                    return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();
                }
            }
            
        } else {
            if ($password_input == '') {

                if ($this->validate([
                    'username_user' => ['rules' => 'required','errors' => [
                        'required' => 'Username harus diisi',
                    ],
                ],
        
                ]))
                {
                    //jika valid
        
                    $data = array(
                        'id_user' => $id_user,
                        'username_user' => $this->request->getPost('username_user'),
                    );
                    $this->Model_User->edit($data);
                    session()->setFlashdata('pesan1', 'Data berhasil diupdate');
                    // return redirect()->to(base_url('User'));
                    return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();
        
                    
                } else {
                    //jika tidak valid
                    
                    // $validation = \Config\Services::validation();
                    // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
                    return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();
                }
            } else {

                if ($this->validate([
                    'username_user' => ['rules' => 'required','errors' => [
                        'required' => 'Username harus diisi',
                    ],
                ],
                    'password_user' => ['rules' => 'required|matches[konfirmpassword]','errors' => [
                            'required' => 'Password harus diisi',
                            'matches' => 'Password tidak sama'
                        ],
                    ],
        
                ]))
                {
                    
                    //jika valid
        
                    $pwcrypted = $this->request->getPost('password_user');
        
                    $data = array(
                        'id_user' => $id_user,
                        'username_user' => $this->request->getPost('username_user'),
                        'password_user' => md5($pwcrypted),
                    );
                    $this->Model_User->edit($data);
                    session()->setFlashdata('pesan1', 'Data berhasil diupdate');
                    // return redirect()->to(base_url('User'));
                    return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();
        
                    
                } else {
                    //jika tidak valid
                    
                    // $validation = \Config\Services::validation();
                    // session()->setFlashData('errors', \Config\Services::validation()->getErrors());
                    return redirect()->to(base_url('/User/edit/'.$id_user))->withInput();
                }
            }
            
        }

        
    }





}