<?php

//definir constantes
define('TEMPLATES_URL', __DIR__ . '/templates');//DIR tomara la ubicacion?
define('FUNCIONES',  __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/public/imagenes/');
$inicio = false;

function incluirTemplate(string $nombre, bool $inicio ){//si la variable inicio no esta definido como true no colocara la imagen 
    include  TEMPLATES_URL ."/${nombre}.php"; 
}

function estaAutenticado(){
    session_start();
    
  
    if(!$_SESSION['login']){
                header('location: ../../../principal.php');
    }
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;

}

function s($html) {
    $s = htmlspecialchars($html);
    return $s;
}

//validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];

    return in_array($tipo, $tipos);
}

function mostrarNotificacion($codigo){
    $mensaje = '';

    switch($codigo){
        case 1:
            $mensaje = 'Creado Correctamente';
            break;

        case 2:
            $mensaje = 'Actualizado Correctamente';
            break;

        case 3:
            $mensaje = 'Eliminado Correctamente';
            break;

        case 4:
            $mensaje = 'E-mail enviado Correctamente';
            break;
        
        case 5:
            $mensaje = 'E-mail no fue enviado';
            break;
    

        default:
        $mensaje = false;
        break;
             
    }

    return $mensaje;
}

function vaidarORedireccionar(string $url){
    //validar la URL por el id de cada uno
    $id = $_GET['id'];//    id=parametro
    $id = filter_var($id, FILTER_VALIDATE_INT);//filtro de confirmacion de si es un entero

    if(!$id){
        header("Location: ${url}");
    }

    return $id;
}
