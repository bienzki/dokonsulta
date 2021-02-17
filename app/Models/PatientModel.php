<?php

namespace App\Models;

use CodeIgniter\Model;

class PatientModel extends Model
{
    protected $table      = 'patient';
    protected $primaryKey = 'patientId';

    protected $returnType     = 'array';

    protected $allowedFields = ['patientId', 'company', 'occupation', 'telephone', 'father', 'fatherOcc', 'mother', 'motherOcc', 'contactPerson', 'contactNumber', 'drugAllergy', 'foodAllergy', 'medications', 'historySurgery', 'historyHospital', 'diagnose'];
}