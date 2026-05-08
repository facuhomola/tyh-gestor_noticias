<?php

namespace App\Controllers;

use App\Models\UserModel;

class AdminUsuarios extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        helper(['form']);
    }

   public function index() // Lista los usuarios registrados
    {
        $data['usuarios'] = $this->userModel
            ->where('rol !=', 'admin')
            ->findAll();

        return view('admin/usuarios/listar', $data);
    }

    // Mostrar formulario crear
    public function crear()
    {
        return view('admin/usuarios/crear');
    }

    // Guardar usuario en la Bsae de Datos
    public function guardar()
    {
        $this->userModel->save([
            'username'   => $this->request->getPost('username'),
            'contrasenia' => password_hash($this->request->getPost('contrasenia'), PASSWORD_BCRYPT),
            'rol'      => $this->request->getPost('rol'),
        ]);

        session()->setFlashdata('success', '¡El registro se realizó correctamente!'); // Vista para notificar la acción realizada

        return redirect()->to('admin/usuarios');
    }

    // Editar usuario (form)
    public function editar($id)
    {
        $data['usuario'] = $this->userModel->find($id);
        return view('admin/usuarios/editar', $data);
    }

    // Actualizar usuario
    public function actualizar($id)
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'contrasenia'  => $this->request->getPost('contrasenia'),
            'rol'    => $this->request->getPost('rol')
        ];

        // Solo actualizar password si se envía
        if ($this->request->getPost('contrasenia')) {
            $data['password'] = password_hash(
                $this->request->getPost('contrasenia'),
                PASSWORD_DEFAULT
            );
        }

        $this->userModel->update($id, $data);

        return redirect()->to('inicio');
    }

    // Eliminar usuario
    public function eliminar($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('inicio');
    }

    // Lista de noticias creadas
    public function auditoria()
    {
        // Solo admin
        if(session()->get('rol') !== 'admin'){
            return redirect()->to('/login');
        }

        $model = new \App\Models\NoticiaModel();

        $data['noticias'] = $model->getTodasNoticias();

            return view('admin/auditoria', $data);
        }

    }