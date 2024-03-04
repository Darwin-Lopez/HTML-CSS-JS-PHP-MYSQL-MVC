<?php
    require_once("../model/ClassEmpleado.php"); // Incluir la clase Empleado para interactuar con la base de datos
    session_start(); // Iniciar sesión para mantener los datos entre solicitudes
    $empleado = new Empleado(); // Crear una nueva instancia de la clase Empleado

    // Verificar si la solicitud es de tipo GET
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $id = $_GET["id"]; // Obtener el ID del empleado a eliminar desde los parámetros de la URL

        // Llamar al método setEliminarEmpleado para eliminar al empleado de la base de datos
        $result = $empleado->setEliminarEmpleado($id);

        // Verificar si la eliminación fue exitosa
        if($result){
            $_SESSION["DELETE_EMPLOYEE_SUCCESS"] = true; // Establecer una variable de sesión para indicar éxito
            header("Location: ../view/empleado.php"); // Redireccionar de vuelta a la página de visualización de empleados después de la eliminación
        }else{
            $_SESSION["DELETE_EMPLOYEE_ERROR"] = false; // Establecer una variable de sesión para indicar error
            echo "Ocurrió un error, no se pudo eliminar el empleado"; // Mostrar un mensaje de error si la eliminación no fue exitosa
        }
    }
?>
