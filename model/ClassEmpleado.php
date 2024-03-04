<?php
require_once("../config/conexionMYSQL.php");
class Empleado
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
    /**
     * A description of the entire PHP function.
     *
     * @param datatype $paramname description
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function getEmpleados()
    {
        try {
            $sql = "SELECT e.id_empleado, e.nombre, e.foto, e.salario, p.titulo, p.descripcion, p.fecha_inicio, p.fecha_final FROM empleados e INNER JOIN proyectos p ON e.id_proyecto = p.id_proyecto";

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if ($stmt) {
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $datos = array();
                foreach ($resultado as $dato) {
                    $datos[] = $dato;
                }
                return $datos;
            } else {
                return array();
            }
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
    /**
     * Set insertar empleado function
     *
     * @param datatype $nombre description
     * @param datatype $salario description
     * @param datatype $departamento description
     * @param datatype $telefono description
     * @param datatype $correo description
     * @param datatype $foto description
     * @param datatype $id_proyecto description
     * @throws Exception Error Processing Request
     * @return boolean
     */
    public function setInsertarEmpleado(
        $nombre,
        $salario,
        $departamento,
        $telefono,
        $correo,
        $foto,
        $id_proyecto
    ) {
        try {
            $sql = " INSERT INTO `empleados` (`nombre`, `salario`, `departamento`, `telefono`, `correo`, `foto`, `id_proyecto`) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$nombre, $salario, $departamento, $telefono, $correo, $foto, $id_proyecto]);
            if ($stmt) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
    /**
     * A description of the entire PHP function.
     *
     * @param datatype $id description
     * @throws Exception description of exception
     * @return bool
     */
    public function setEliminarEmpleado($id)
    {
        try {
            $sql = "DELETE FROM empleados WHERE id_empleado = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([$id]);
            if ($stmt) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
    /**
     * A description of the entire PHP function.
     *
     * @param datatype $paramname description
     * @throws Some_Exception_Class description of exception
     * @return Some_Return_Value
     */
    public function getAllEmpleados()
    {
        try {
            $sql = "SELECT * FROM empleados";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            if ($stmt) {
                $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $datos = array();
                foreach ($resultado as $dato) {
                    $datos[] = $dato;
                }
                return $datos;
            } else {
                return array();
            }
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
    /**
     * A description of the entire PHP function.
     *
     * @param datatype $nombre description
     * @param datatype $foto description
     * @param datatype $salario description
     * @param datatype $descripcion description
     * @param datatype $fecha_inicio description
     * @param datatype $fecha_final description
     * @param datatype $id_empleado description
     * @throws Exception description of exception
     * @return boolean
     */
    public function setActualizarEmpleado(
        $nombre,
        $foto,
        $salario,
        $descripcion,
        $fecha_inicio,
        $fecha_final,
        $id_empleado
    ) {
        try {
            if (!empty($foto)) {
                $sql = "UPDATE empleados AS e 
                        INNER JOIN proyectos AS p ON e.id_proyecto = p.id_proyecto 
                        SET e.nombre = ?, e.foto = ?, e.salario = ?, p.descripcion = ?, p.fecha_inicio = ?, p.fecha_final = ? 
                        WHERE e.id_empleado = ?";

                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$nombre, $foto, $salario, $descripcion, $fecha_inicio, $fecha_final, $id_empleado]);

                if ($stmt) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $sql = "UPDATE empleados AS e 
                INNER JOIN proyectos AS p ON e.id_proyecto = p.id_proyecto 
                SET e.nombre = ?, e.salario = ?, p.descripcion = ?, p.fecha_inicio = ?, p.fecha_final = ? 
                WHERE e.id_empleado = ?";

                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$nombre, $salario, $descripcion, $fecha_inicio, $fecha_final, $id_empleado]);

                if ($stmt) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
    /**
     * A method to update employee information in the database.
     *
     * @param string $nombre employee name
     * @param float $salario employee salary
     * @param string $departamento employee department
     * @param string $telefono employee phone number
     * @param string $correo employee email
     * @param string $foto employee photo
     * @param int $id employee ID
     * @throws Exception Error Processing Request
     * @return bool
     */
    public function setUpdateEmpleado(
        $nombre,
        $salario,
        $departamento,
        $telefono,
        $correo,
        $foto,
        $id
    ) {
        try {
            if (!empty($foto)) {
                $sql = "UPDATE `empleados` SET `nombre` = ?, `salario` = ?, `departamento` = ?, `telefono` = ?, `correo` = ?, `foto` = ? WHERE `id_empleado` = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$nombre, $salario, $departamento, $telefono, $correo, $foto, $id]);
                if ($stmt) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $sql = "UPDATE `empleados` SET `nombre` = ?, `salario` = ?, `departamento` = ?, `telefono` = ?, `correo` = ? WHERE `id_empleado` = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$nombre, $salario, $departamento, $telefono, $correo, $id]);
                if ($stmt) {
                    return true;
                } else {
                    return false;
                }
            }
        } catch (PDOException $e) {
            throw new Exception("Error Processing Request" . $e->getMessage());
        }
    }
}
