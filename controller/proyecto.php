<?php   
session_start(); // Iniciar la sesión para mantener los datos entre solicitudes
require_once("../model/ClassProyecto.php"); // Incluir la clase Proyecto para interactuar con la base de datos

// Verificar si la solicitud es de tipo POST y si se ha enviado el formulario de inserción de proyecto
if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["btn-insertar-Proyecto"])){
    // Recoger los datos enviados por el formulario
    $titulo = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $fecha_inicio = $_POST["fecha_inicio"];
    $fecha_final = $_POST["fecha_final"];

    // Verificar si todos los campos están llenos
    if(!empty($titulo) && !empty($descripcion) && !empty($fecha_inicio) && !empty($fecha_final)){
        // Crear una instancia de la clase Proyecto
        $proyecto = new Proyecto();
        
        // Llamar al método setInsertarProyecto para insertar el nuevo proyecto en la base de datos
        $resultado = $proyecto->setInsertarProyecto($titulo, $descripcion, $fecha_inicio, $fecha_final);
        
        // Verificar si la inserción fue exitosa
        if($resultado){
            $_SESSION["SUCCESS-INSERT-QUERY"] = true; // Establecer una variable de sesión para indicar éxito
        }else{
            $_SESSION["ERROR-INSERT-QUERY"] = false; // Establecer una variable de sesión para indicar error
        }
    }else{
        $_SESSION["EMPTY-INSERT-PROYECTO"] = false; // Establecer una variable de sesión para indicar campos vacíos
    }

    header("Location: ../view/proyecto.php"); // Redireccionar de vuelta a la página de proyectos
}else{
    header("Location: ../view/home.php"); // Redireccionar a la página de inicio si la solicitud no es de tipo POST
    exit();
}
?>
