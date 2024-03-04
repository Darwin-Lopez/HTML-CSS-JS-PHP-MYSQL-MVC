<?php
session_start(); // Iniciar la sesión
require_once("../../../config/conexionMysqlProcedural.php");

// Definir la función para obtener el usuario desde la base de datos
function getInputUsuario($usuario, $clave, $conn)
{
    try {
        // Preparar la consulta SQL
        $sql = "SELECT * FROM autentication WHERE usuario = ?";
        $stmt = mysqli_prepare($conn, $sql);

        // Vincular los parámetros y ejecutar la consulta
        mysqli_stmt_bind_param($stmt, "s", $usuario);
        mysqli_stmt_execute($stmt);

        // Obtener el resultado de la consulta
        $result = mysqli_stmt_get_result($stmt);

        // Verificar si se encontró un usuario con el nombre de usuario proporcionado
        if ($result && $usuario_encontrado = mysqli_fetch_assoc($result)) {
            // Verificar si la contraseña proporcionada coincide con la contraseña almacenada
            if (password_verify($clave, $usuario_encontrado['clave'])) {
                return $usuario_encontrado; // Devolver los datos del usuario
            }
        }
        
        return null; // Devolver null si no se encontró ningún usuario o la contraseña no coincide
    } catch (Exception $e) {
        throw new Exception("Error Processing Request: " . $e->getMessage());
    }
}

// Verificar si la solicitud es de tipo POST y si se ha enviado el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn-loginEmpleado"])) {
    $usuario = $_POST["usuarioEmpleado"]; // Obtener el nombre de usuario del formulario
    $clave = $_POST["claveEmpleado"]; // Obtener la clave del usuario del formulario

    // Verificar si tanto el nombre de usuario como la clave no están vacíos
    if (!empty($usuario) && !empty($clave)) {
        // Obtener los datos del usuario de la base de datos
        $usuario_encontrado = getInputUsuario($usuario, $clave, $conn);

        // Verificar si se encontró un usuario con las credenciales proporcionadas
        if ($usuario_encontrado) {
            $_SESSION["SUCCESS-QUERY-USUARIO"] = $usuario; // Establecer una variable de sesión con los datos del usuario
            $_SESSION["SUCCESS-QUERY-LOGIN"] = true; // Establecer una variable de sesión para indicar éxito en el inicio de sesión
            header("Location: ../homeEmpleado.php?usuario=$usuario"); // Redireccionar a la página de inicio de sesión
            exit(); // Salir del script para evitar que se ejecute más código
        } else {
            $_SESSION["ERROR-QUERY-LOGIN"] = false; // Establecer una variable de sesión para indicar error en el inicio de sesión
        }
    } else {
        $_SESSION["EMPTY-QUERY-LOGIN"] = false; // Establecer una variable de sesión para indicar que los campos están vacíos
    }
} else {
    header("Location: ../homeEmpleado.php"); // Redireccionar a la página de inicio de sesión si la solicitud no es de tipo POST
    exit(); // Salir del script para evitar que se ejecute más código
}
?>
