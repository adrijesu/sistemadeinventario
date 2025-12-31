<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['sesion_email'])) {
    header('Location: '.$URL.'/login');
    exit();
}