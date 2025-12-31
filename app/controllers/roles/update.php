<?php
include '../../config.php';
 session_start();
$id_rol = $_POST['id_rol'];
$rol = strtoupper(trim($_POST['rol']));


        $sentencia = $pdo->prepare("UPDATE tb_roles 
        SET rol =:rol,
        
        
        fyh_actualizacion=:fyh_actualizacion WHERE id_rol=:id_rol");
    
        
        $sentencia->bindParam('rol',$rol);
    
        $sentencia->bindParam('fyh_actualizacion',$fechaHora);
        $sentencia->bindParam('id_rol',$id_rol);
        
        if($sentencia->execute()){
            
            $_SESSION['mensaje'] = "Se actualizo Correctamente";
            $_SESSION['icono'] = "success";
            header('location: '.$URL.'/roles');
        }else{
            
           
            $_SESSION['mensaje'] = "error no se pudo actualizar";
            $_SESSION['icono'] = "error";
            header('location: '.$URL.'/roles/update.php?id='.$id_rol);
        }
        
       
    
   
        
    
