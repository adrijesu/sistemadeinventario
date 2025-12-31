<?php
include '../../config.php';
session_start();

$rol = strtoupper(trim($_POST['rol']));

$sentencia = $pdo->prepare(
    "INSERT INTO tb_roles (rol, fyh_creacion) 
     VALUES (:rol, :fyh_creacion)"
);

$sentencia->bindParam(':rol', $rol);
$sentencia->bindParam(':fyh_creacion', $fechaHora);

if ($sentencia->execute()) {

    $_SESSION['mensaje'] = "Se registró el rol correctamente";
    $_SESSION['icono']   = "success";
    header('Location: '.$URL.'/roles');
    exit();

} else {

    $_SESSION['mensaje'] = "No se pudo registrar el rol";
    $_SESSION['icono']   = "error";
    header('Location: '.$URL.'/roles/create.php');
    exit();
}


//echo $fechaHora;