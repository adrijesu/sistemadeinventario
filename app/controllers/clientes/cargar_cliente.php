<?php 

$clientes_datos = []; // para evitar errores si no existe cliente

// Si existe id_cliente y no está vacío
if (isset($id_cliente) && $id_cliente != "") {
    
    $sql_clientes = "SELECT * FROM tb_clientes WHERE id_cliente = :id_cliente";
    $query_clientes = $pdo->prepare($sql_clientes);
    $query_clientes->bindParam(':id_cliente', $id_cliente);
    $query_clientes->execute();
    $clientes_datos = $query_clientes->fetchAll(PDO::FETCH_ASSOC);

} else {
    // Si la venta no tiene cliente, devolvemos datos "vacíos"
    $clientes_datos[] = [
        "nombre_cliente" => "VENTA SIN CLIENTE",
        "nit_ci_cliente" => "S/N",
        "celular_cliente" => "S/N"
    ];
}