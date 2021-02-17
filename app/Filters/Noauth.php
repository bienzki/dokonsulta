<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Noauth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if (session()->get('isLoggedIn'))
            if (session()->get('type') == 'admin')
                return redirect()->to('/admin/dashboard');
            elseif (session()->get('type') == 'doctor')
                return redirect()->to('/physicians/dashboard');
            elseif (session()->get('type') == 'patient')
                return redirect()->to('/patients/appointments');
            elseif (session()->get('type') == 'secretary')
                return redirect()->to('/secretary/dashboard');
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
