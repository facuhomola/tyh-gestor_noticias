<?php

namespace App\Controllers;

use App\Models\NoticiaModel;

class Validador extends BaseController
{
    protected $noticiaModel;

    public function __construct()
    {
        $this->noticiaModel = new NoticiaModel();
    }

    // Pantalla inicial del validador
    public function index()
    {
        return view('validador/index');
    }

    // Listado de noticias a validar
    public function listar()
    {
        // Verificar si está logueado
        if (!session()->get('usuario_id')) {
            return redirect()->to('/login');
        }

        // Verificar rol "validador"
        if (session()->get('rol') !== 'validador' && session()->get('rol') !== 'ambos') {
            return redirect()->to('inicio'); // Si no es validador, va al inicio de su panel como editor
        }


        $data['noticias'] = $this->noticiaModel->getNoticiasParaValidar();
        return view('validador/listar', $data);
    }

    // Acción: validar noticia
    public function validar($id)
    {
        // Verificar rol "validador"
        if (session()->get('rol') !== 'validador' && session()->get('rol') !== 'ambos') {
            return redirect()->to('inicio'); // Si no es validador, va al inicio de su panel como editor
        }

        $model = new NoticiaModel();

        // Obtener noticia actual
        $noticia = $model->find($id);

        // ==========================================
        // VALIDAR TITULO DUPLICADO PUBLICADO
        // ==========================================

        $existe = $model
            ->where('titulo', $noticia['titulo'])
            ->where('estado', 'publicada')
            ->where('id_noticia !=', $id)
            ->first();

        if ($existe) {

            return redirect()->back()->with(
                'error',
                'No se puede publicar la noticia porque ya existe otra publicada con el mismo título.'
            );
        }


        // Guardar estado anterior
        $estadoAnterior = $noticia['estado'];

        // Nuevo estado
        $estadoNuevo = 'publicada';

        // Registrar auditoría
        $auditoriaModel = new \App\Models\AuditoriaModel();

        $auditoriaModel->save([
            'noticia_id' => $id,
            'usuario_id' => session('usuario_id'),
            'estado_anterior' => $estadoAnterior,
            'estado_nuevo' => $estadoNuevo,
            'accion' => 'validar'
        ]);

        $this->noticiaModel->validarNoticia($id);
        
        return redirect()->to('/validador/listar'); // La noticia pasa a estado "publicado"
    }

    // Acción: enviar a revisión
    public function revision($id)
    {

        $model = new NoticiaModel();

        // Obtener noticia actual
        $noticia = $model->find($id);

        // Guardar estado anterior
        $estadoAnterior = $noticia['estado'];

        // Nuevo estado
        $estadoNuevo = 'revision';

        // Registrar auditoría
        $auditoriaModel = new \App\Models\AuditoriaModel();

        $auditoriaModel->save([
            'noticia_id' => $id,
            'usuario_id' => session('usuario_id'),
            'estado_anterior' => $estadoAnterior,
            'estado_nuevo' => $estadoNuevo,
            'accion' => 'revision'
        ]);

        $this->noticiaModel->enviarRevision($id);
        return redirect()->to('/validador/listar');
    }
}