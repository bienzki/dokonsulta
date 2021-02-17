<?php

namespace App\Models;

use CodeIgniter\Model;

class AppointmentModel extends Model
{
    protected $table      = 'appointment';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'doctorId', 'patientId', 'clinicId', 'date', 'problem', 'problemStart', 'medication', 'allergy', 'height', 'weight', 'temperature', 'info', 'file', 'type', 'status', 'created', 'updated'];

    protected $useTimestamps = true;
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
}
