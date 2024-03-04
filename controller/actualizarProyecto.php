<?php
session_start(); // Iniciar sesión para mantener los datos entre solicitudes
require_once("../model/ClassProyecto.php"); // Incluir la clase Proyecto para interactuar con la base de datos
$proyecto = new Proyecto(); // Crear una nueva instancia de la clase Proyecto

// Verificar si la solicitud es de tipo POST y si se ha enviado el formulario de actualización de proyecto
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn-actualizar-Proyecto"])){
    // Recoger los datos enviados por el formulario
    $nombre = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fecha_incio = $_POST["fecha_inicio"];
    $fecha_final = $_POST["fecha_final"];
    $id = $_POST["id_proyeto"];

    // Llamar al método setActualizarProyecto para actualizar la información del proyecto en la base de datos
    $resultado = $proyecto->setActualizarProyecto($nombre, $descripcion, $fecha_incio, $fecha_final, $id);

    // Verificar si la actualización fue exitosa
    if($resultado){
        $_SESSION["UPDATE_SUCCESS_PROYECTO"] = true; // Establecer una variable de sesión para indicar éxito
    }else{
        $_SESSION["UPDATE_ERROR_PROYECTO"] = false; // Establecer una variable de sesión para indicar error
    }
    header("Location: ../view/proyecto.php"); // Redireccionar de vuelta a la página de visualización de proyectos después de la actualización
}else{
    header("Location: ../view/proyecto.php"); // Redireccionar a la página de visualización de proyectos si la solicitud no es de tipo POST
    exit();
}
?>
