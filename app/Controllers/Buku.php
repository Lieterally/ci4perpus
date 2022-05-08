<?php

namespace App\Controllers;

class Buku extends BaseController
{
    public function index()
    {
        $data = array(
            'title' => 'Buku',
            'isi' => 'buku/v_buku',

        );
        return view('layout/v_wrapper', $data);
    }
}