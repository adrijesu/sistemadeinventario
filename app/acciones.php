<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/*
 Permisos por acción
*/
function permitirAccion(string $accion, array $permisos) {

    if (!isset($_SESSION['rol'])) {
        header('Location: '.$GLOBALS['URL'].'/login');
        exit();
    }

    $rol = $_SESSION['rol'];

    if (!isset($permisos[$rol]) || !in_array($accion, $permisos[$rol])) {
        echo "
        <script>
            alert('No tienes permiso para realizar esta acción');
            window.history.back();
        </script>
        ";
        exit();
    }
}