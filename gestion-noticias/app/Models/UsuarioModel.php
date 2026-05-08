<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $allowedFields = ['username', 'contrasenia', 'rol'];

    public function getByUsername($username)
    {
        return $this->where('username', $username)->first();
    }

}