<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function dashboard() {
        $data = [
			'metaTitle' => 'Dashboard - DoKonsulta',
        ];
        
        echo view('/admin/templates/header', $data);
        echo view('/admin/dashboard');
        echo view('/admin/templates/footer');
    }
}
