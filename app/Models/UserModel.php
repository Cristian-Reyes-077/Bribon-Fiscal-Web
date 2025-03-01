<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';

    public function validateUser($username, $password)
    {
        return $this->where('username', $username)
                    ->where('password', $password)
                    ->first(); // Retorna el usuario si existe
    }
}
