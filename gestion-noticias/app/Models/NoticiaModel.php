<?php

namespace App\Models;

use CodeIgniter\Model;

class NoticiaModel extends Model
{
    protected $table = 'noticias';
    protected $primaryKey = 'id_noticia';

    protected $allowedFields = [
        'titulo',
        'descripcion',
        'fecha_creacion',
        'fecha_publicacion',
        'imagen',
        'estado',
        'autor_id'
    ];

    protected $useTimestamps = false;

    public function getTodasNoticias() // Traer todas las noticias
    {
        return $this->orderBy('fecha_creacion', 'DESC')
                    ->findAll();
    }

    //obtener noticias en estado borrador
    public function getBorradores($usuarioId)
    {
    return $this->where('estado', 'borrador')
            ->where('autor_id', $usuarioId)
            ->orderBy('fecha_creacion', 'DESC')
            ->findAll();
    }

    public function getNoticia($id)
    {
        return $this->find($id);
    }

     // Obtener noticias en estado "listaParaPublicar"
    public function getNoticiasParaValidar()
    {
        return $this->where('estado', 'listaParaPublicar')->findAll();
    }

    // Validar noticia (publicar)
    public function validarNoticia($id)
    {
        return $this->update($id, [
            'estado' => 'publicada',
            'fecha_publicacion' => date('Y-m-d')
        ]);
    }

    // Enviar a revisión (volver a borrador)
    public function enviarRevision($id)
    {
        return $this->update($id, [
            'estado' => 'revision'
        ]);
    }

    // traer noticias en estado revision
    public function getNoticiasRevision($usuarioId)
    {
        return $this->where('estado', 'revision')
                ->orderBy('fecha_creacion', 'DESC')
                ->where('autor_id', $usuarioId)
                ->findAll();
    }
}