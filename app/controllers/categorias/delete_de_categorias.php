<?php
include '../../config.php';
session_start();

$id_categoria = $_GET['id_categoria'] ?? null;
if (!$id_categoria) {
    echo "sin_id";
    exit();
}

try {
    // verificar si la categoría está en uso
    $sql = "SELECT COUNT(*) FROM tb_almacen WHERE id_categoria = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id_categoria);
    $query->execute();

    if ($query->fetchColumn() > 0) {
        echo "en_uso";
        exit();
    }

    // eliminar categoría
    $sql = "DELETE FROM tb_categorias WHERE id_categoria = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(':id', $id_categoria);

    if ($query->execute()) {
        echo "ok";
    } else {
        echo "error";
    }

} catch (PDOException $e) {
    echo $e->getMessage(); // SOLO para pruebas
}
