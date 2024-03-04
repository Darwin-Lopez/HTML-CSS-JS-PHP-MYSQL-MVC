<?php
require_once("../config/conexionMYSQL.php");
class Registro
{
    private $conn;
    /**
     * Constructor for the class.
     */
    public function __construct()
    {
        $conectar = new ConexionMYSQL();
        $this->conn = $conectar->getConexion();
    }
    /*
     * Set Registrar function description
     *
     * @param datatype $usuario description
     * @param datatype $clave description
     * @param datatype $full_name description
     * @param datatype $correo description
     * @param datatype $numero description
     * @param datatype $dni description
     * @param datatype $edad description
     * @param datatype $especialidad description
     * @param datatype $foto description
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function setRegistrar(
        $usuario,
        $clave,
        $full_name,
        $correo,
        $numero,
        $dni,
        $edad,
        $especialidad,
        $foto
    ) {
        try {
            $clave_ecriptada = password_hash($clave, PASSWORD_BCRYPT);
            $sql = "INSERT INTO autentication (usuario,clave,nombres,correo,numero,dni,edad,especialidad,foto,fecha_creacion)
            VALUES (?,?,?,?,?,?,?,?,?,NOW())";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$usuario, $clave_ecriptada, $full_name, $correo, $numero, $dni, $edad, $especialidad, $foto]);

            return true; // Devuelve true si la inserción es exitosa
        } catch (PDOException $e) {
            // Lanza una excepción en caso de error
            throw new Exception("Error al insertar en la base de datos: " . $e->getMessage());
        }
    }

    /**
     * Check if a user exists in the autentication table.
     *
     * @param mixed $usuario 
     * @throws Exception Error Processing Request
     * @return bool
     */
    public function ifExistUser($usuario){
        try {
            $sql = "SELECT * FROM autentication WHERE usuario = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$usuario]);
            $resultado = $stmt->fetchColumn();
            return $resultado > 0;
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }

}
