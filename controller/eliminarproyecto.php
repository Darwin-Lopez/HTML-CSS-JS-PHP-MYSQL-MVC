<?php
    require_once("../model/ClassProyecto.php"); // Incluir la clase Proyecto para interactuar con la base de datos
    session_start(); // Iniciar sesión para mantener los datos entre solicitudes
    $proyecto = new Proyecto(); // Crear una nueva instancia de la clase Proyecto

    // Verificar si la solicitud es de tipo GET
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $id = $_GET["id"]; // Obtener el ID del proyecto a eliminar desde los parámetros de la URL

        // Llamar al método setEliminarProyecto para eliminar el proyecto de la base de datos
        $result = $proyecto->setEliminarProyecto($id);

        // Verificar si la eliminación fue exitosa
        if($result){
            $_SESSION["DELETE_EMPLOYEE_SUCCESS"] = true; // Establecer una variable de sesión para indicar éxito
            header("Location: ../view/proyecto.php"); // Redireccionar de vuelta a la página de visualización de proyectos después de la eliminación
        }else{
            $_SESSION["DELETE_EMPLOYEE_ERROR"] = false; // Establecer una variable de sesión para indicar error
            echo "Ocurrió un error, no se pudo eliminar el proyecto"; // Mostrar un mensaje de error si la eliminación no fue exitosa
        }
    }else{
        header("Location: ../view/proyecto.php"); // Redireccionar a la página de visualización de proyectos si la solicitud no es de tipo GET
    }
?>
