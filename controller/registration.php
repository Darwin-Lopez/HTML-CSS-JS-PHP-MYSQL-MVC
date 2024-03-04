<?php
session_start(); // Iniciar la sesión para mantener los datos entre solicitudes
require_once("../model/ClassRegistro.php"); // Incluir la clase Registro para interactuar con la base de datos
$obj = new Registro(); // Crear una nueva instancia de la clase Registro

// Verificar si la solicitud es de tipo POST y si se ha enviado el formulario de registro
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn-registrar"])) {
    // Recoger los datos enviados por el formulario
    $usuario = $_POST["usuario"];
    $full_name = $_POST["full_name"];
    $correo = $_POST["correo"];
    $dni = $_POST["dni"];
    $especialidad = $_POST["especialidad"];
    $edad = $_POST["edad"];
    $numero = $_POST["numero"];
    $clave = $_POST["clave"];
    $clave_confirm = $_POST["clave_confirm"];

    $ruta = "";

    // Verificar si las contraseñas coinciden
    if (!hash_equals($clave, $clave_confirm)) {
        $_SESSION["ERROR-AUTENTICACION"] = "ERROR-AUTENTICACION"; // Establecer una variable de sesión para indicar error de autenticación
        header("Location: ../view/sign_up.php"); // Redireccionar de vuelta al formulario de registro
    } else {
        // Verificar si ya existe un usuario con el mismo nombre de usuario
        if ($obj->ifExistUser($usuario)) {
            $_SESSION["ERROR-QUERY-EXIST"] = false; // Establecer una variable de sesión para indicar que el usuario ya existe
            header("Location: ../view/sign_up.php"); // Redireccionar de vuelta al formulario de registro
        } else {
            // Verificar si se ha subido una foto
            if (isset($_FILES["foto"]["tmp_name"])) {
                $nombre = $_FILES["foto"]["name"];
                $ruta = "./img/" . $nombre; // Definir la ruta donde se almacenará la foto
                move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta); // Mover la foto al directorio deseado
            } else {
                $ruta = ""; // Si no se subió una foto, la ruta se deja vacía
            }

            // Llamar al método setRegistrar para registrar un nuevo usuario en la base de datos
            $result = $obj->setRegistrar($usuario, $clave, $full_name, $correo, $numero, $dni, $edad, $especialidad, $ruta);

            // Verificar si la consulta fue exitosa
            if ($result) {
                $_SESSION["SUCCESS-QUERY-CREATE"] = "CONSULTA EXITOSA"; // Establecer una variable de sesión para indicar éxito de la consulta
                header("Location: ../view/sign_up.php"); // Redireccionar de vuelta al formulario de registro
            } else {
                $_SESSION["ERROR-QUERY"] = "ERROR DE CONSULTA"; // Establecer una variable de sesión para indicar error de consulta
                header("Location: ../view/sign_up.php"); // Redireccionar de vuelta al formulario de registro
                
            }
        }
    }
} else {
    header("Location: ../view/sign_up.php"); // Redireccionar a la página de registro si la solicitud no es de tipo POST
    exit();
}
?>
