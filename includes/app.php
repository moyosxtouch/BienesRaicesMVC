<?php

//Este es el archivo que manda a llamar funciones, bases de datos y clases
require "funciones.php";
require "config/database.php";
require __DIR__ . "/../vendor/autoload.php";
//Conectarnos a la base de datos
$db=conectarDb();
use Model\ActiveRecord;
ActiveRecord::setDB($db);

