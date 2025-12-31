<?php
include '../../config.php';
include '../../seguridad.php';
include '../../permisos.php';

permitirRoles(['ADMINISTRADOR']);

$id_cliente = $_GET['id_cliente'] ?? null;
$nombre = $_GET['nombre_cliente'] ?? '';
$nit = $_GET['nit_ci_cliente'] ?? '';
$celular = $_GET['celular_cliente'] ?? '';

if (!$id_cliente || $nombre == '' || $nit == '' || $celular == '') {
  echo "error";
  exit();
}

try {
  $sql = "UPDATE tb_clientes 
          SET nombre_cliente = :nombre,
              nit_ci_cliente = :nit,
              celular_cliente = :celular
          WHERE id_cliente = :id";

  $query = $pdo->prepare($sql);
  $query->bindParam(':nombre', $nombre);
  $query->bindParam(':nit', $nit);
  $query->bindParam(':celular', $celular);
  $query->bindParam(':id', $id_cliente);

  if ($query->execute()) {
    echo "ok";
  } else {
    echo "error";
  }

} catch (PDOException $e) {
  echo "error_excepcion";
}
