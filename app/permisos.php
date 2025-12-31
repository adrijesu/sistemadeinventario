<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function permitirRoles(array $rolesPermitidos) {

    if (!isset($_SESSION['rol'])) {
        header('Location: '.$GLOBALS['URL'].'/login');
        exit();
    }

    if (!in_array($_SESSION['rol'], $rolesPermitidos)) {
        header('Location: '.$GLOBALS['URL'].'/index.php');
        exit();
    }
}