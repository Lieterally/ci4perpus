<?php

namespace App\Controllers;
use App\Models\Model_User;

class User extends BaseController
{

    public function __construct()
    {
        $this->Model_User=new Model_User();
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
}