<?php

require_once("../config/conexionMYSQL.php");
class Login
{
    private $conn;
    /**
     * Constructs a new instance of the class.
     */
    public function __construct()
    {
        $conectar = new ConexionMYSQL();
        $this->conn = $conectar->getConexion();
    }
    /*
     * A description of the entire PHP function.
     *
     * @param datatype $usuario description
     * @param datatype $clave description
     * @throws Exception description of exception
     * @return bool|array
     */

    public function getInputUsuario($usuario, $clave)
    {
        try {
            $sql = "SELECT * FROM autentication WHERE usuario = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$usuario]);
            $usuario_encontrado = $stmt->fetch(PDO::FETCH_ASSOC);

            if (password_verify($clave, $usuario_encontrado['clave'])) {
                return true;
            } else {
                return array();
            }
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request: " . $e->getMessage());
        }
    }
}
