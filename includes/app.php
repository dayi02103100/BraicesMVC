<?php

require 'funciones.php';//al mandar a llamar este archivo habilita la opcion para agregar las definiciones
require 'config/databases.php';
require __DIR__ . '/../vendor/autoload.php';

$db=conectarDb(); 
use Model\ActiveRecord;

ActiveRecord::setDB($db);


