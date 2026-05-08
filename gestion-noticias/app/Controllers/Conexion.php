<?php

//Controlador utilizado para la revisión de conexión a la base de datos

namespace App\Controllers;

use CodeIgniter\Controller;

class Conexion extends Controller
{
    /*
    public function index()
    {
        try {
            $db = \Config\Database::connect();

            if ($db) {
                echo "✅ Conexión exitosa a la base de datos";
            } else {
                echo "❌ No se pudo conectar a la base de datos";
            }

        } catch (\Exception $e) {
            echo "❌ Error de conexión: " . $e->getMessage();
        }
    }
    */

    public function index()
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT 1");

        if ($query) {
            echo "✅ Conexión y consulta OK";
        } else {
            echo "❌ Error en la conexión";
    }
}

}

?>