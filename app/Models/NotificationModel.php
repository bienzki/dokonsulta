<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table      = 'notification';
    protected $primaryKey = 'id';

    protected $returnType     = 'array';

    protected $allowedFields = ['id', 'toUser', 'fromUser', 'message', 'created', 'updated', 'isSeen'];

    protected $useTimestamps = true;
    protected $createdField  = 'created';
    protected $updatedField  = 'updated';
}
