<?php
namespace Model;
use Model\ActiveRecord;

class Propiedad extends ActiveRecord{
    protected static $tabla = 'propiedades';
    protected static $columasDB = ['id','titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado',
    'vendedorId'];
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

    
    public function __construct($args = [])//arreglo vacio
    
    {
        $this->id = $args['id'] ?? '';
        $this->titulo = $args['titulo'] ?? '';
        $this-> precio = $args['precio'] ?? '';
        $this-> imagen = $args['imagen']?? '';
        $this-> descripcion = $args['descripcion'] ?? '';
        $this-> habitaciones = $args['habitaciones']?? '';
        $this-> wc = $args['wc'] ?? '';
        $this-> estacionamiento = $args['estacionamiento']?? '' ;
        $this-> creado = date('Y/m/d');
        $this-> vendedorId = $args['vendedorId']?? '' ;
            
    }
     

 
    public function validar(){
        //insercion de mensajes al campo vacio
        if(!$this->titulo){
            self::$errores[]="debes añadir un titulo";
        }

        if(!$this->precio){
            self::$errores[]="debes añadir un precio";
        }
        
        if(!$this->imagen){
            self::$errores[]="debes añadir una imagen de la propiedad";
        }

        if(strlen(!$this->descripcion)){
            self::$errores[]="debes añadir una descripcion o es muy corta";
        }

        if(!$this->habitaciones){
            self::$errores[]="debes añadir el numero de habitaciones";
        }

        if(!$this->wc){
            self::$errores[]="debes añadir el numero de baños";
        }

        if(!$this->estacionamiento){
            self::$errores[]="debes añadir el numero de estacionamientos";
        }

        if(!$this->vendedorId){
            self::$errores[]="debes elegir un vendedor";
        }


        return self::$errores;
    }
   
}