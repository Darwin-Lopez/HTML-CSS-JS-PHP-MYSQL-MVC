<?php
session_start(); // Iniciar sesión para mantener los datos entre solicitudes
require_once("../model/ClassEmpleado.php"); // Incluir la clase Empleado para interactuar con la base de datos
$empleado = new Empleado(); // Crear una nueva instancia de la clase Empleado

// Verificar si la solicitud es de tipo POST y si se ha enviado el formulario de actualización de empleado
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn-Actualizar-Empleado"])){
    // Recoger los datos enviados por el formulario
    $nombre = $_POST["nombre"];
    $salario = $_POST["salario"];
    $departamento = $_POST["departamento"];
    $telefono = $_POST["telefono"];
    $correo = $_POST["correo"];
    $id = $_POST["id_empleado"];

    $ruta = "";

    // Verificar si se ha subido una nueva foto para el empleado
    if(!empty($_FILES["foto"]["tmp_foto"]) && isset($_FILES["foto"]["tmp_name"])){
        $name = $_FILES["foto"]["name"];
        $ruta = "./img-actualizarEmpleado/" . $name; // Definir la ruta donde se almacenará la nueva foto
        move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta); // Mover la foto al directorio deseado
    }else{
        $ruta = ""; // Si no se subió una nueva foto, la ruta se deja vacía
    }

    // Llamar al método setUpdateEmpleado para actualizar la información del empleado en la base de datos
    $resultado = $empleado->setUpdateEmpleado($nombre, $salario, $departamento, $telefono, $correo, $ruta, $id);
    
    // Verificar si la actualización fue exitosa
    if($resultado){
        $_SESSION["UPDATE_EMPLEADO_EMPLOYEE_SUCCESS"] = true; // Establecer una variable de sesión para indicar éxito
    }else{
        $_SESSION["UPDATE_EMPLEADO_EMPLOYEE_ERROR"] = false; // Establecer una variable de sesión para indicar error
    }
    
    // Redireccionar de vuelta a la página de visualización de empleados después de la actualización
    header("Location: ../view/empleado.php");
}
?>
