<?php

namespace App\Controllers;

use App\Models\NoticiaModel;

class Noticias extends BaseController
{
    // Mostrar formulario
    public function crear()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (session()->get('rol') != 'editor' && session()->get('rol') != 'ambos') {
            return redirect()->to('/inicio');
        }

        return view('noticias/crear');
    }

    // Guardar noticia - Lista para validar
    public function guardar()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to('/login');
        }

        if (session()->get('rol') != 'editor' && session()->get('rol') != 'ambos') {
            return redirect()->to('/inicio');
        }

        $model = new NoticiaModel(); // Model Noticia
        $accion = $this->request->getPost('accion'); // valor para el estado de noticia

        $data = [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'fecha_creacion' => date('Y-m-d'), 
            'fecha_publicacion' => "0000-00-00",
            'imagen' => $this->request->getPost('imagen'), 
            'autor_id' => session()->get('usuario_id')
        ];

        if ($accion === 'borrador') {
            $data['fecha_creacion'] = date('Y-m-d');
            $data['estado'] = 'borrador';
        } else {
            $estado = "listaParaPublicar";
            $data['fecha_creacion'] = date('Y-m-d');
            $data['estado'] = 'listaParaPublicar';
        }

        // Control de campos titulo y descripcion

        $rules = [
        'titulo' => [
            'rules' => 'required|min_length[10]|max_length[100]',
            'errors' => [
                'required' => 'El título es obligatorio.',
                'min_length' => 'El título debe tener mínimo 10 caracteres.',
                'max_length' => 'El título debe tener máximo 100 caracteres.'
            ]
        ],

        'descripcion' => [
            'rules' => 'required|min_length[50]',
                'errors' => [
                'required' => 'La descripción es obligatoria.',
                'min_length' => 'La descripción debe tener mínimo 50 caracteres.'
                ]
            ]
        ];

        if(!$this->validate($rules)){

            return redirect()->back()
                         ->withInput()
                         ->with('errores', $this->validator->getErrors());
        }

        $model->insert($data);

        // Obtener ID insertado
        $noticiaId = $model->insertID();

        // Registrar auditoría
        $auditoriaModel = new \App\Models\AuditoriaModel();

        $auditoriaModel->save([
            'noticia_id' => $noticiaId,
            'usuario_id' => session('usuario_id'),
            'estado_anterior' => null,
            'estado_nuevo' => $estado,
            'accion' => 'crear'
        ]);

        session()->setFlashdata('success', '¡La noticia se creo de forma exitosa!');

        return redirect()->to('/inicio')
            ->with('mensaje', 'Noticia creada correctamente');
    }

    public function borradores() // Listar noticias en estado borrador de cada usuario
    {
        // Validar sesión
        if (
            session()->get('rol') !== 'editor' &&
            session()->get('rol') !== 'ambos'
        )   {
            return redirect()->to('/login');
        }

        // Obtener usuario logueado
        $usuarioId = session()->get('usuario_id');

        $model = new NoticiaModel();

        // Obtener SOLO borradores del usuario
        $data['noticias'] = $model->getBorradores($usuarioId);

        return view('noticias/borradores', $data);
    }

    // Editar noticia
    public function editar($id)
    {

        // Validar sesión
        if (
            session()->get('rol') !== 'editor' &&
            session()->get('rol') !== 'ambos'
        )   {
            return redirect()->to('/login');
        }
    
        $model = new NoticiaModel();

        $data['noticia'] = $model->getNoticia($id);

        return view('noticias/editar_noticia', $data);
    }

    // Actualizar noticia
    public function actualizar($id)
    {

        // Validar sesión
        if (
            session()->get('rol') !== 'editor' &&
            session()->get('rol') !== 'ambos'
        )   {
            return redirect()->to('/login');
        }

        // Modelo noticia
        $model = new NoticiaModel();

        // estado de la noticia
        $noticiaActual = $model->find($id);
        $estadoAnterior = $noticiaActual['estado'];

        // Capturar acción del botón
        $accion = $this->request->getPost('accion');

        // Determinar estado
        // Estado según botón
        switch($accion){

            case 'borrador':
                $estado = 'borrador';
                break;

            case 'anulada':
                $estado = 'anulada';
                break;

            default:
                $estado = 'listaParaPublicar';
                break;
        }

        $data = [
            'titulo' => $this->request->getPost('titulo'),
            'descripcion' => $this->request->getPost('descripcion'),
            'imagen' => $this->request->getPost('imagen'),
            'fecha_creacion' => date('Y-m-d'),
            'estado' => $estado
        ];

        $model->update($id, $data);

        // Registrar auditoría
        $auditoriaModel = new \App\Models\AuditoriaModel();
        $auditoriaModel->save([
            'noticia_id' => $id,
            'usuario_id' => session('usuario_id'),
            'estado_anterior' => $estadoAnterior,
            'estado_nuevo' => $estado,
            'accion' => $accion
        ]);

        session()->setFlashdata('success', '¡La noticia se actualizo de forma exitosa!');

        return redirect()->to(base_url('inicio'));
    }

    public function revision() // Función para traer noticias en estado "revision" -> para corrección
    {
        // Validar que sea editor
        if (session()->get('rol') !== 'editor' && session()->get('rol') !== 'ambos') {
            return redirect()->to('/login');
        }

        // Obtener ID usuario logueado
        $usuarioId = session()->get('usuario_id');

        $model = new \App\Models\NoticiaModel();

        // Obtener SOLO noticias del usuario
        $data['noticias'] = $model->getNoticiasRevision($usuarioId);
        //$data['noticias'] = $model->getNoticiasRevision();

        return view('noticias/revision', $data);
    }

    public function historial($id) // Historial de auditoria
    {
        $auditoriaModel = new \App\Models\AuditoriaModel();

        $data['historial'] = $auditoriaModel->getHistorialNoticia($id);
    
        return view('noticias/historial', $data);
    }

}