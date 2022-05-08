<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Home',
            'isi' => 'v_home',

        );
        return view('layout/v_wrapper', $data);
    }
}