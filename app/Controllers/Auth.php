<?php

namespace App\Controllers;

use App\Models\Model_Auth;

class Auth extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->Model_Auth=new Model_Auth();
    }
    
    public function index()
    {

        $data = array(
            'title' => 'Login',

        );
        return view('v_login', $data);
    }

    public function login()
    {

        if ($this->validate([
            'username_user' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan {field}',
                ],
            ],
            'password_user' => [
                'label'  => 'Password',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Masukkan {field}',
                ],
            ],

        ])){
            //jika valid
            $username = $this->request->getPost('username_user');
            $password= $this->request->getPost('password_user');
            $cek = $this->Model_Auth->login($username, $password);
            if ($cek) {

                session()->set('log', true);
                session()->set('nama_user', $cek['nama_user']);
                session()->set('username_user', $cek['username_user']);
                session()->set('foto_user', $cek['foto_user']);
                return redirect()->to(base_url('/Dashboard'));
            } else {
                session()->setFlashData('pesan', 'Username atau Password salah');
                return redirect()->to(base_url('/Auth'));
            }
            
            
        } else {
            //jika tidak valid
            session()->setFlashData('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/Auth'));
            
        }
    }

    public function logout() {
        session()-> remove('log');
        session()-> remove('nama_user');
        session()-> remove('username_user');
        session()->remove('foto_user');

        session()->setFlashData('pesan', 'Anda telah logout');
        return redirect()->to(base_url('/Auth'));
    }
}