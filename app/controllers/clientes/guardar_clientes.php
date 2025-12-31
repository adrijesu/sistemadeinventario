<?php
include '../../config.php';


$nombre_cliente = $_POST['nombre_cliente'];
$nit_ci_cliente = $_POST['nit_ci_cliente'];
$celular_cliente = $_POST['celular_cliente'];


$celular = trim($_POST['celular_cliente']);

if (!ctype_digit($celular)) {
    echo "El celular solo debe contener números";
    exit;
}

if (strlen($celular) != 9) {
    echo "El celular debe tener exactamente 9 dígitos";
    exit;
}

if ($celular[0] !== '9') {
    echo "El celular debe iniciar con 9";
    exit;
}

   
    $sentencia = $pdo->prepare("INSERT INTO tb_clientes
            (nombre_cliente, nit_ci_cliente, celular_cliente, fyh_creacion) 
    VALUES (:nombre_cliente,:nit_ci_cliente,:celular_cliente,:fyh_creacion)");

    $sentencia->bindParam('nombre_cliente',$nombre_cliente);
    $sentencia->bindParam('nit_ci_cliente',$nit_ci_cliente);
    $sentencia->bindParam('celular_cliente',$celular_cliente);
     
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    if($sentencia->execute()){
      ?>
        <script>
            location.href = "<?php echo $URL; ?>/ventas/create.php";
        </script>
        <?php
    }else{
        session_start();
        $_SESSION['mensaje'] = "no se pudo registrar";
        $_SESSION['icono']="error";
        ?>
        <script>
           location.href = "<?php echo $URL; ?>/ventas/create.php";
        </script>
        <?php
    }

   



//echo $fechaHora;