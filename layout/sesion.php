<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (
    !isset($_SESSION['sesion_email']) ||
    !isset($_SESSION['id_usuario']) ||
    !isset($_SESSION['rol'])
) {
    header('Location: '.$URL.'/login');
    exit();
}

$email_sesion = $_SESSION['sesion_email'];
$id_usuario_sesion = $_SESSION['id_usuario'];
$rol_sesion = $_SESSION['rol'];