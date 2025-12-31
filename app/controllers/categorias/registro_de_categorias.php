<?php
include '../../config.php';
session_start();

$nombre_categoria = trim($_GET['nombre_categoria']);

// validar vacío
if ($nombre_categoria == "") {
    echo "error_vacio";
    exit();
}

// validar duplicado
$sql = "SELECT COUNT(*) FROM tb_categorias WHERE nombre_categoria = :nombre_categoria";
$query = $pdo->prepare($sql);
$query->bindParam(':nombre_categoria', $nombre_categoria);
$query->execute();

if ($query->fetchColumn() > 0) {
    echo "duplicado";
    exit();
}

// insertar
$sentencia = $pdo->prepare("
    INSERT INTO tb_categorias (nombre_categoria, fyh_creacion)
    VALUES (:nombre_categoria, :fyh_creacion)
");

$sentencia->bindParam(':nombre_categoria', $nombre_categoria);
$sentencia->bindParam(':fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    $_SESSION['mensaje'] = "Se registró la categoría correctamente";
    $_SESSION['icono'] = "success";
    echo "ok";
} else {
    echo "error";
}