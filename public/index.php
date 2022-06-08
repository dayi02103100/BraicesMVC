<?php

require_once __DIR__ .'/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router();

$router->get('/propiedades/admin', [PropiedadController::class, 'index'] );


$router->get('/propiedades/crear', [PropiedadController::class, 'crear'] );
$router->post('/propiedades/crear', [PropiedadController::class, 'crear'] );
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);

//vendedores

$router->get('/vendedores/crear', [VendedorController::class, 'crear'] );
$router->post('/vendedores/crear', [VendedorController::class, 'crear'] );
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

//paginas
$router->get('/paginas/index', [PaginasController::class, 'index'] );
$router->get('/paginas/nosotros', [PaginasController::class, 'nosotros'] );
$router->get('/paginas/propiedades', [PaginasController::class, 'propiedades'] );
$router->get('/paginas/propiedad', [PaginasController::class, 'propiedad'] );
$router->get('/paginas/blog', [PaginasController::class, 'blog'] );
$router->get('/paginas/entrada', [PaginasController::class, 'entrada'] );
$router->get('/paginas/contacto', [PaginasController::class, 'contacto'] );
$router->post('/paginas/contacto', [PaginasController::class, 'contacto'] );



$router->comprobarRutas();

?>