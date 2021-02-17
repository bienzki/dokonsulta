<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangayModel extends Model
{
    protected $table      = 'barangay';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['name', 'cityId'];
}
