<?php
include '../../config.php';
include '../../seguridad.php';
include '../../permisos.php';

permitirRoles(['ADMINISTRADOR']);

$id_cliente = $_GET['id_cliente'] ?? null;
if (!$id_cliente) {
  echo "sin_id";
  exit();
}

try {
  $sql = "DELETE FROM tb_clientes WHERE id_cliente = :id";
  $query = $pdo->prepare($sql);
  $query->bindParam(':id', $id_cliente);

  if ($query->execute()) {
    echo "ok";
  } else {
    echo "error";
  }
} catch (PDOException $e) {
  echo "error_excepcion";
}
