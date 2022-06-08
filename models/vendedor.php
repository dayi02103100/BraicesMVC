<?php
namespace Model;

class vendedor extends ActiveRecord{

    protected static $tabla = 'vendedores';
    protected static $columasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;
    public function __construct($args = [])//arreglo vacio
    {

        $this-> id = $args['id'] ?? NULL; 
//      $this-> id = $args['id'] ? $args['id']: NULL; 
        $this->nombre = $args['nombre'] ?? '';
        $this-> apellido = $args['apellido'] ?? '';
        $this-> telefono = $args['telefono'] ?? '';
        
    }

    public function validar(){
        //insercion de mensajes al campo vacio
        if(!$this->nombre){
            self::$errores[]="debes añadir un nombre";
        }

        if(!$this->apellido){
            self::$errores[]="debes añadir un apellido";
        }
        
        if(!$this->telefono){
            self::$errores[]="debes añadir un telefono";
        }

        if(!preg_match('/[0-9]{10}/', $this->telefono)){
            self::$errores[]="formato (telefono) no valido";
        }

        

        return self::$errores;
    }

}