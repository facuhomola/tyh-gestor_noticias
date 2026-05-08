<?php

namespace App\Models;

use CodeIgniter\Model;

class AuditoriaModel extends Model
{
    protected $table = 'auditoria_noticias';

    protected $primaryKey = 'id';

    protected $allowedFields = [
        'noticia_id',
        'usuario_id',
        'estado_anterior',
        'estado_nuevo',
        'accion',
        'fecha'
    ];

    protected $useTimestamps = false;

    // Obtener historial completo de una noticia
    public function getHistorialNoticia($noticiaId)
    {
        return $this->select('auditoria_noticias.*, usuarios.username')
                    ->join('usuarios', 'usuarios.usuario_id = auditoria_noticias.usuario_id')
                    ->where('noticia_id', $noticiaId)
                    ->orderBy('fecha', 'DESC')
                    ->findAll();
    }
}