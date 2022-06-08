<?php
namespace Controllers;

use MVC\Router;
use Model\vendedor;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{
   public static function index(Router $router){
         $propiedad = Propiedad::get(3);
         $inicio =  true;
         $router->render('paginas/index',[
            'propiedad' => $propiedad,
            'inicio' => $inicio//pagina layout
        
        ]);

    }

    public static function nosotros(Router $router){
        $router->render('paginas/nosotros');
    }
    
       
    public static function propiedades(Router $router){
        $propiedad = Propiedad::all();
        $router->render('paginas/propiedades',[
            'propiedad' => $propiedad,
        ]);
    } 
    
    public static function propiedad(Router $router){
        $mensaje = null;
        $id = vaidarORedireccionar('/propiedades');

        $propiedad = Propiedad::find($id);
                
        $router->render('paginas/propiedad',[
            'propiedad' => $propiedad[0]
        ]);
            
    }        
      
    public static function blog(Router $router){
        $router->render('paginas/blog');
    }
     
    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router){
        $mensaje = null;
        if($_SERVER['REQUEST_METHOD'] ==='POST'){


            $respuestas = $_POST['contacto'];


            //crear una instancia de PHPMailer
            $mail = new PHPMailer();

            // configurar SMTP (protocolo para envio de emails)
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';//dominio
            $mail->SMTPAuth = true;//autenticacion
            $mail->Username = '2a568e572bb75c';
            $mail->Password = 'ee27cf1ee78b24';
            $mail->SMTPSecure = 'tls';//encriptacion
            $mail->Port =  2525;//puerto

            //configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com');//quien envia el email
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');//a que email llegara//nombre
            $mail->Subject = 'Tienes un nuevo mensaje';//mensaje que llegara 

            //habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';//"mostrar correctamente los acentos"
            
            //definir el contenido
            $contenido = '<html>';
            $contenido .='<p>Tienes un nuevo mensaje</p>';
            $contenido .='<p>Nombre: '. $respuestas['nombre'] .'</p>';

            if($respuestas['contacto'] === 'telefono'){
                $contenido .='<p>Eligio ser contactado por medio del telefono</p>';
                $contenido .='<p>Telefono: '. $respuestas['telefono'] .'</p>';
                $contenido .='<p>Fecha: '. $respuestas['fecha'] .'</p>';
                $contenido .='<p>Hora: '. $respuestas['hora'] .'</p>';
    
            }else{
                $contenido .='<p>Eligio ser contactado por medio del gmail</p>';
                $contenido .='<p>E-mail: '. $respuestas['mail'] .'</p>';

            }
            $contenido .='<p>Mensaje: '. $respuestas['mensaje'] .'</p>';
            $contenido .='<p>Vende o Compra: '. $respuestas['tipo'] .'</p>';
            $contenido .='<p>Precio o Presupuesto: $ '. $respuestas['precio'] .'</p>';
            $contenido .='<p>Forma de contacto: '. $respuestas['contacto'] .'</p>';

            $contenido .= '</html>';
            
            
            $mail->Body = $contenido;
            $mail->AltBody = 'esto es texto alternativo sin html';


            //enviar el email
            if($mail->send()){
                $mensaje = 'E-mail enviado Correctamente';
            }else{
                $mensaje = 'E-mail no fue enviado';
            }


        }
        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }   
    
}