<?php


function conectarDb(){
    $db = new mysqli('localhost','root','','bienesr');

    if(!$db){
        echo "error no se conecto";
        exit;
    }

    return $db;
}




















/*
//Tipos de conexiones a bases de datos:
//mysql: Conexión a mysql no orientada a objetos.
//mysqli: Conexión a mysql orientada a objetos.
//PDO: Conexión a Bases de Datos orientados a objetos.
class  db{
    private static $db=NULL;
    private function __construct (){}

    public static function conectarDb(){
        $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
        self::$db= new PDO('mysql:host=localhost;dbname=braices','root','',$pdo_options);
        
       
        return self::$db;
       
    }	
   
}

*/
	
?>



