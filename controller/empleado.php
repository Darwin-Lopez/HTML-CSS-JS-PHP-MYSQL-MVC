<?php
session_start(); // Iniciar sesión para mantener los datos entre solicitudes
require_once("../model/ClassEmpleado.php"); // Incluir la clase Empleado para interactuar con la base de datos

$empleado = new Empleado(); // Crear una nueva instancia de la clase Empleado

// Verificar si la solicitud es de tipo POST y si se ha enviado el formulario de inserción de empleado
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn-insertar-empleado"])) {
    // Recoger los datos enviados por el formulario
    $nombre = $_POST["nombre"];
    $salario = $_POST["salario"];
    $departamento = $_POST["departamento"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $proyecto = $_POST["proyecto"];

    // Verificar si no se ha seleccionado un proyecto para el empleado
    if(empty($proyecto)) {
        $_SESSION["EMPLOYEE_ERROR_PROJECT"] = true; // Establecer una variable de sesión para indicar error
        header("Location: ../view/empleado.php"); // Redireccionar de vuelta a la página de inserción de empleado
        exit();
    }

    $ruta = "";

    // Verificar si se ha subido una foto para el empleado
    if(isset($_FILES["foto"]["tmp_name"])) {
        $nombreArchivo = $_FILES["foto"]["name"];
        $ruta = "./img-empleado/" . $nombreArchivo; // Definir la ruta donde se almacenará la foto del empleado
        move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta); // Mover la foto al directorio deseado
    }else{
        $ruta = "";
    }

    // Llamar al método setInsertarEmpleado para insertar un nuevo empleado en la base de datos
    $resultadoInsercion = $empleado->setInsertarEmpleado(
        $nombre,
        $salario,
        $departamento,
        $telefono,
        $correo,
        $ruta,
        $proyecto
    );

    // Verificar si la inserción fue exitosa
    if($resultadoInsercion) {
        $_SESSION["EMPLOYEE_ERROR_PROJECT"] = false; // Establecer una variable de sesión para indicar éxito
    } else {
        $_SESSION["EMPLOYEE_ERROR_PROJECT"] = true; // Establecer una variable de sesión para indicar error
    }

    header("Location: ../view/empleado.php"); // Redireccionar de vuelta a la página de inserción de empleado
    exit();
} else {
    header("Location: ../view/empleado.php"); // Redireccionar a la página de inserción de empleado si la solicitud no es de tipo POST
    exit();
}
?>
