<?php

namespace App\Controllers;
use App\Models\Model_Buku;


class Home extends BaseController
{

    public function __construct()
    {
  
        $this->Model_Buku = new Model_Buku();

    }

    public function index()
    {
        $data = array(
            'title' => 'Home',
            'buku' => $this->Model_Buku->all_data(),

        );
        return view('landing/v_landing', $data);
    }
}