<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'firstName', 'middleName', 'lastName', 'suffix', 'birthday', 'gender', 'civilStatus', 'bloodType', 'province', 'city', 'barangay', 'street', 'mobile', 'email', 'password', 'status', 'image', 'type', 'created', 'updated', 'token', 'slug'];

    protected $useTimestamps = true;
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
}
