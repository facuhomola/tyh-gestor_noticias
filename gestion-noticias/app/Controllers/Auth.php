<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class Auth extends BaseController
{
    public function login()
    {
        return view('auth/login');
    }

    public function autenticar()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('contrasenia');

        $usuarioModel = new \App\Models\UsuarioModel();
        $usuario = $usuarioModel->getByUsername($username);

        if ($usuario && password_verify($password, $usuario['contrasenia'])) {

        // Guardar datos en sesión
        session()->set([
            'usuario_id' => $usuario['usuario_id'],
            'username'   => $usuario['username'],
            'rol'        => $usuario['rol'],
            'logged_in'  => true
        ]);

        return redirect()->to('/inicio');
        } else {
            return redirect()->back()->with('error', 'Usuario o contraseña incorrectos');
        } 
        // Controla los datos del usuario para validar, si es correcto lo redirige al inicio, sino los vuelve a ingresar
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
    // Destruye la sesión completa del usuario logueado, y redirige al sistema de login.
}