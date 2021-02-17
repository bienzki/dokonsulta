<?php

namespace App\Models;

use CodeIgniter\Model;

class FavoriteModel extends Model
{
    protected $table      = 'favorites';
    protected $primaryKey = 'favoriteId';

    protected $returnType     = 'array';

    protected $allowedFields = ['favoriteId', 'patientId', 'doctorId', 'created', 'updated'];

    protected $useTimestamps = true;
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
}
