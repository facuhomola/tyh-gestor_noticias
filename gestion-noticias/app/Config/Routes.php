<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// INICIO
$routes->get('/inicio', 'Home::inicio');

$routes->get('/', 'Home::index');
$routes->get('/conexion', 'Conexion::index'); // Verificar conexión a BD

// ADMINISTRADOR
$routes->group('admin/usuarios', function($routes) {
    $routes->get('/', 'AdminUsuarios::index');
    $routes->get('crear', 'AdminUsuarios::crear'); // Crear nuevo usuario
    $routes->post('guardar', 'AdminUsuarios::guardar'); // Guardar en base de datos
    $routes->get('editar/(:num)', 'AdminUsuarios::editar/$1'); // Editar datos de usuario registrado
    $routes->post('actualizar/(:num)', 'AdminUsuarios::actualizar/$1'); // Actualizar datos de usuario
    $routes->get('eliminar/(:num)', 'AdminUsuarios::eliminar/$1'); // Eliminar usuario
});

$routes->get('admin/auditoria', 'AdminUsuarios::auditoria'); // Traer historial de noticias

//USUARIOS
$routes->get('/usuarios', 'Usuarios::index'); // Listar usuarios
$routes->get('/usuarios/crear', 'Usuarios::crear'); // Crear un nuevo usuario
$routes->post('/usuarios/guardar', 'Usuarios::guardar'); // Almacenar en la BD el nuevo usuario
$routes->get('/usuarios/editar/(:num)', 'Usuarios::editar/$1'); // Editar usuario registrado
$routes->post('/usuarios/actualizar/(:num)', 'Usuarios::actualizar/$1'); // Actualizar usuario registrado

//SESIONES
$routes->get('/login', 'Auth::login'); // loguear usuarios
$routes->post('/autenticar', 'Auth::autenticar'); // autenticar usuarios 
$routes->get('/logout', 'Auth::logout'); // destruir sesion

//NOTICIAS
$routes->get('/crear', 'Noticias::crear'); //genera una nueva noticia
$routes->post('/guardar', 'Noticias::guardar'); //guarda la noticia

//EDITAR NOTICIAS
$routes->get('/borradores', 'Noticias::borradores'); // Ver borradores
$routes->get('/editar/(:num)', 'Noticias::editar/$1'); // Editar borrador
$routes->post('/actualizar/(:num)', 'Noticias::actualizar/$1'); // Actualizar
$routes->get('noticias/revision', 'Noticias::revision'); // revision

// VALIDAR NOTICIA
$routes->get('/validador', 'Validador::index'); // Opción para listar
$routes->get('/validador/listar', 'Validador::listar'); // listado de noticias para validar
$routes->get('/validador/validar/(:num)', 'Validador::validar/$1'); // valida la noticia y publica
$routes->get('/validador/revision/(:num)', 'Validador::revision/$1'); // la manda a revision y queda como borrador para el editor

// HISTORIAL DE NOTICIA
$routes->get('noticias/historial/(:num)', 'Noticias::historial/$1');