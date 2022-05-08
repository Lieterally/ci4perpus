<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Filter_Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        
        if (session()->get('log') !=true) {
            session()->setFlashData('pesan', 'Silahkan login terlebih dahulu');
            return redirect()->to(base_url('/Auth'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->get('log') ==true) {
            
            return redirect()->to(base_url('/Dashboard'));
        }
    }
}