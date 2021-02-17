<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersCheck implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        $uri = service('uri');

        if ($uri->getSegment(1) == 'patients') {
            if (!session()->get('isLoggedIn') || session()->get('type') != 'patient')
                return redirect()->to('/');
        }

        if ($uri->getSegment(1) == 'admin') {
            if (!session()->get('isLoggedIn') || session()->get('type') != 'admin')
                return redirect()->to('/');
        }

        if ($uri->getSegment(1) == 'physicians') {
            if (!session()->get('isLoggedIn') || session()->get('type') != 'doctor')
                return redirect()->to('/');
        }

        if ($uri->getSegment(1) == 'secretary') {
            if (!session()->get('isLoggedIn') || session()->get('type') != 'secretary')
                return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
