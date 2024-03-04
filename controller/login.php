<?php
session_start(); // Iniciar la sesión

// Incluir la clase Login para interactuar con la base de datos
include_once("../model/ClassLogin.php");

// Verificar si la solicitud es de tipo POST y si se ha enviado el formulario de inicio de sesión
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn-login"])){
    $usuario = $_POST["usuario"]; // Obtener el nombre de usuario del formulario
    $clave = $_POST["clave"]; // Obtener la clave del usuario del formulario

    // Verificar si tanto el nombre de usuario como la clave no están vacíos
    if(!empty($usuario) && !empty($clave)){
        $login = new Login(); // Crear una nueva instancia de la clase Login
        $result = $login->getInputUsuario($usuario, $clave); // Obtener los datos del usuario de la base de datos

        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if($result==true){
            $_SESSION["SUCCESS-QUERY-USUARIO"] = $usuario; // Establecer una variable de sesión con el nombre de usuario
            $_SESSION["SUCCESS-QUERY-LOGIN"] = true; // Establecer una variable de sesión para indicar éxito en el inicio de sesión
        }else{
            $_SESSION["ERROR-QUERY-LOGIN"] = false; // Establecer una variable de sesión para indicar error en el inicio de sesión
        }
    }else{
        $_SESSION["EMPTY-QUERY-LOGIN"] = false; // Establecer una variable de sesión para indicar que los campos están vacíos
    }
    header("Location: ../view/login.php"); // Redireccionar de vuelta a la página de inicio de sesión
}else{
    header("Location: ../view/login.php"); // Redireccionar a la página de inicio de sesión si la solicitud no es de tipo POST
    exit(); // Salir del script para evitar que se ejecute más código
}
?>
