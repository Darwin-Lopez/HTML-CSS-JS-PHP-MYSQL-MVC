<?php
session_start(); // Iniciar la sesión para mantener los datos entre solicitudes
require_once("../model/ClassEmpleado.php"); // Incluir la clase Empleado para interactuar con la base de datos
$empleado = new Empleado(); // Crear una nueva instancia de la clase Empleado

// Verificar si la solicitud es de tipo POST y si se ha enviado el formulario de actualización de empleado
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn-actualizar"])) {
    // Recoger los datos enviados por el formulario
    $nombre = $_POST["nombre"];
    $salario = $_POST["salario"];
    $descripcion = $_POST["descripcion"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_final = $_POST["fecha_final"];
    $id = $_POST["id_actualizar"];

    $ruta = "";

    // Verificar si se ha subido una nueva foto para el empleado
    if (empty($_FILES["foto"]["tmp_name"])) {
        $ruta = ""; // Si no se subió una nueva foto, la ruta se deja vacía
    } else {
        // Si se subió una nueva foto, procesarla
        if (isset($_FILES["foto"]["tmp_name"]) && !empty($_FILES["foto"]["tmp_name"])) {
            $nombreImg = $_FILES["foto"]["name"];
            $ruta = "./img-actualizacion/" . $nombreImg; // Definir la ruta donde se almacenará la nueva foto
            move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta); // Mover la foto al directorio deseado
        }
    }
    
    // Llamar al método setActualizarEmpleado para actualizar la información del empleado en la base de datos
    $resultado = $empleado->setActualizarEmpleado($nombre, $ruta, $salario, $descripcion, $fecha_inicio, $fecha_final, $id);
    
    // Verificar si la actualización fue exitosa
    if ($resultado) {
        $_SESSION["UPDATE_EMPLOYEE_SUCCESS"] = true; // Establecer una variable de sesión para indicar éxito
    } else {
        $_SESSION["UPDATE_EMPLOYEE_ERROR"] = false; // Establecer una variable de sesión para indicar error
    }
    header("location: ../view/home.php"); // Redireccionar de vuelta a la página de inicio después de la actualización
} else {
    header("location: ../view/home.php"); // Redireccionar a la página de inicio si la solicitud no es de tipo POST
    exit();
}
?>
