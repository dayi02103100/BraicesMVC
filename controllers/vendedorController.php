<?php

namespace Controllers;
use MVC\Router;
use Model\vendedor;

 
class VendedorController{
    public static function crear(Router $router){
        $vendedor = new vendedor;
        $errores = vendedor::getErrores();

        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            $vendedor = new vendedor($_POST['vendedor']);           
            $errores = $vendedor->validar();

            //si no hay errores: empty//verifica si esta vacio
          if(empty($errores)){
            $vendedor->crear();
          }
    }
    $router->render('/vendedores/crear', [
        'vendedor' => $vendedor,
        'errores' => $errores
    ]); 
}

    public static function actualizar(Router $router){
    $id = vaidarORedireccionar('/public/index.php/propiedades/admin');

    $vendedor = vendedor::find($id);
    $errores = vendedor::getErrores();


    if($_SERVER['REQUEST_METHOD'] ==='POST'){
        //asignar los valores
        $args = $_POST['vendedor'];

        //sincronizar objeto en memoria con lo que el usuario registro
        $vendedor->sincronizar($args);

        //validacion
        $errores = $vendedor->validar();

        if(empty($errores)){
            $vendedor->actualizar();
        }
    }
    $router->render('/vendedores/actualizar',[
        'vendedor' => $vendedor,
        'errores' => $errores
    ]);
}

    
public static function eliminar(){
        
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //validando id
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if($id){
         $tipo  = $_POST['tipo'];
                    
            if(validarTipoContenido($tipo)){
                $vendedores = vendedor::find($id);
                $vendedores->eliminarV();
            }      
        }
    }
         
    }
}

