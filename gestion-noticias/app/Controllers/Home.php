<?php

namespace App\Controllers;

class Home extends BaseController
{

    public function index(): string
    {
        return view('welcome_message');
    }

    // Función inicio: controla que el usuario este logueado para poder acceder a su panel, en caso contrario lo regresa al login

    public function inicio()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }
        return view('inicio');
    }

}
