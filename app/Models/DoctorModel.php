<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorModel extends Model
{
    protected $table      = 'doctor';
    protected $primaryKey = 'doctorId';

    protected $returnType     = 'array';

    protected $allowedFields = ['doctorId', 'specialty', 'prcLicense', 's2License', 'ptrNo', 'prcId', 'signature'];
}
