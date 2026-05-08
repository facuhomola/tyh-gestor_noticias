<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $allowedFields = [
        'username',
        'contrasenia',
        'rol'
    ];

    /*
    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form']);

        if (session()->get('rol') !== 'admin') {
            exit('Acceso no autorizado');
        }
    }*/

    protected $useTimestamps = false;
}