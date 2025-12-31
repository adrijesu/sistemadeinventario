<?php
include '../../config.php';
session_start(); 

$email = $_POST['email'];
$password_user = $_POST['password_user'];

$sql = "SELECT u.*, r.rol 
        FROM tb_usuarios u
        INNER JOIN tb_roles r ON u.id_rol = r.id_rol
        WHERE u.email = :email";

$query = $pdo->prepare($sql);
$query->bindParam(':email', $email);
$query->execute();

$usuario = $query->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($password_user, $usuario['password_user'])) {

    $_SESSION['sesion_email'] = $usuario['email'];
    $_SESSION['id_usuario']   = $usuario['id_usuario'];
    $_SESSION['rol']          = $usuario['rol'];

    header('Location: '.$URL.'/index.php');
    exit();

} else {
    $_SESSION['mensaje'] = "ERROR: Datos incorrectos";
    header('Location: '.$URL.'/login');
    exit();
}