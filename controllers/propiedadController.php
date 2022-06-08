<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\vendedor;
use Model\ActiveRecord;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController{
    
    public static function index(Router $router){
        $propiedades = Propiedad::all();
        $vendedores = vendedor::all();
            //mensaje condicional
     $resultado = $_GET['resultado'] ?? null;


        $router->render('/propiedades/admin', [
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);        
    }
    
    public static function crear(Router $router){
        $propiedad = new Propiedad;
        $vendedor = vendedor::all();
        $errores = Propiedad::getErrores();


        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            $propiedad = new Propiedad($_POST['propiedad']);
     
            
            //generar nombre para las imagenes guardadas
            $nombreImagen = md5( uniqid ( rand(), true ) ) . ".jpg";
        
           //realiza un resize a la imagen con intervetion 
           if($_FILES['propiedad']['tmp_name']['imagen']){
                 $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);//ancho,alto
                 $propiedad->setImagenes($nombreImagen);
           }          
           //valida
            $errores =  $propiedad->validar();                  
         //exit; va aprevenir que se siga ejecutando el resto del codigo         
         //revisar que el array de errores este vacio
         
         if(empty($errores)){    
             //crear carpeta imagenes             
                 if(!is_dir(CARPETA_IMAGENES )){ //is_dir retornara si una carpeta existe o no
                      mkdir(CARPETA_IMAGENES ); //mkdir es para crear un directorio         
                 }
     
             //guardar la imagen servidor
              $imagen->save(CARPETA_IMAGENES  . $nombreImagen);
             
             //guardar en la base de datos
              $propiedad->crear();        
         }                            
      
        }
        $router->render('/propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedor,
            'errores' => $errores
        ]);        
    }

    public static function actualizar(Router $router){
        $id = vaidarORedireccionar('/public/index.php/propiedades/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = vendedor::all();

        $errores = Propiedad::getErrores();


        if($_SERVER['REQUEST_METHOD'] ==='POST'){
            //asignar los atrributos
            $args = $_POST['propiedad'];//???
         
            $propiedad->sincronizar($args);
     
            $errores = $propiedad->validar();
     
     
            //subida de archivos
            //generar un nombre unico
            $nombreImagen = md5( uniqid ( rand(), true ) ) . ".jpg";
        
            if($_FILES['propiedad']['tmp_name']['imagen']){
             $imagen = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);//ancho,alto
             $propiedad->setImagenes($nombreImagen);
         }
     
         //revisar que el array de errores este vacio
         if(empty($errores)){ 
             if(isset($imagen)){
             $imagen->save(CARPETA_IMAGENES . $nombreImagen);
             }
             
         $propiedad->actualizar();      
             
         }               
     }
        $router->render('/propiedades/actualizar',[
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }



    public static function eliminar(Router $router){
        
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //validando id
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        
        if($id){
         $tipo  = $_POST['tipo'];
                    
            if(validarTipoContenido($tipo)){
                $propiedad = Propiedad::find($id);
                $propiedad->eliminar();
            }
      
        }
    }

        $router->render('/propiedades/eliminar',[
            'propiedad' => $propiedad
        ]);
    
    }

}