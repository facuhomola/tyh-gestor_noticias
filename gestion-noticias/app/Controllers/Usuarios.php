<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Usuarios extends BaseController
{
    
    //Lista la tabla de usuarios (función disponible solo para el administrador)
    public function index()
    {
        $usuarioModel = new UsuarioModel();

        $data['usuarios'] = $usuarioModel->findAll();

        return view('usuarios/index', $data);
    }

    //Retorna la vista del formulario para crear un nuevo usuario
    public function crear()
    {

        // Verificar si el usuario es admin
        if (session()->get('rol') != 'admin') {

            return redirect()->to('/login')
                ->with('error', 'No tiene permisos para acceder.');
        }

        return view('usuarios/crear');
    }

    //Guarda el nuevo usuario registrado en la base de datos
    public function guardar()
    {

        if (session()->get('rol') != 'admin') {

        return redirect()->to('/login')
            ->with('error', 'No tiene permisos para realizar esta acción.');
        }

        $usuarioModel = new UsuarioModel();

        $data = [
            'username'    => $this->request->getPost('username'),
            'contrasenia' => password_hash($this->request->getPost('contrasenia'), PASSWORD_BCRYPT),
            'rol'         => $this->request->getPost('rol'),
        ];

        $usuarioModel->insert($data);

        return redirect()->to('/usuarios');
    }

    //modificar datos de usuario registrado
    public function editar($id)
    {
        $usuarioModel = new \App\Models\UsuarioModel();

        $data['usuario'] = $usuarioModel->find($id);

        return view('usuarios/editar', $data);
    }

    //Actualizar datos de usuario registrado
    public function actualizar($id)
    {
        $usuarioModel = new \App\Models\UsuarioModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'rol'      => $this->request->getPost('rol'),
        ];

        if ($this->request->getPost('contrasenia')) {
            $data['contrasenia'] = password_hash(
                $this->request->getPost('contrasenia'),
                PASSWORD_BCRYPT
            );
        }

        $usuarioModel->update($id, $data);

        return redirect()->to('/usuarios');
    }

}