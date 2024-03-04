<?php
    session_start(); // Iniciar la sesión
    session_destroy(); // Destruir todas las variables de sesión
    header("Location: ../view/login.php"); // Redireccionar al usuario a la página de inicio de sesión
    exit(); // Salir del script para evitar que se ejecute más código
?>
