<?php

namespace App\Models;

use CodeIgniter\Model;

class Preuser extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pre_user';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['username',
    'email',
    'password',
    'phone',
    'first_name',
    'last_name','verification',
    'activation_code','user_gender','user_dob','user_age'];

    // Dates
    protected $useTimestamps = false;

}
