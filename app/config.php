<?php
//variables globales
define('SERVIDOR','Localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistemaventas2');

$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;

try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    //echo "La conexion a la base de datos fue con exito";
}catch(PDOException $e){
    //print($e);
    echo "Error al conectar a la base de datos";
}

$URL = "http://localhost/Systemventas";

date_default_timezone_set("America/Lima");
$fechaHora = date('Y-m-d H:i:s');

