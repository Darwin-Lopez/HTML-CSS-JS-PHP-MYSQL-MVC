<?php
    require_once("../config/conexionMYSQL.php");
    class Proyecto{
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
        public function getProyectos(){
            try{
                $sql = "SELECT * FROM proyectos";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                if($stmt){
                    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    $datos = array();
                    foreach ($resultado as $dato) {
                        $datos[] = $dato;
                    }
                    return $datos;
                }else{
                    return array();
                }
            }catch(PDOException $e){
                throw new Exception("Error Processing Request ". $e->getMessage());
                
            }   
        }
        /**
         * A description of the entire PHP function.
         *
         * @param datatype $nombre description
         * @param datatype $descripcion description
         * @param datatype $fecha_inicio description
         * @param datatype $fecha_final description
         * @throws Some_Exception_Class description of exception
         * @return Some_Return_Value
         */
        public function setInsertarProyecto($nombre, $descripcion, $fecha_inicio, $fecha_final){
            try{
                $sql = "INSERT INTO proyectos (titulo, descripcion, fecha_inicio, fecha_final) VALUES(?, ?, ?, ?)";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$nombre, $descripcion, $fecha_inicio, $fecha_final]);
                if($stmt){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                throw new Exception("Error Processing Request" . $e->getMessage());
                
            }
        }
        /**
         * A description of the entire PHP function.
         *
         * @param datatype $id description
         * @throws Exception description of exception
         * @return boolean
         */
        public function setEliminarProyecto($id){
            try{
                $sql = "DELETE FROM proyectos WHERE id_proyecto = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$id]);
                if($stmt){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                throw new Exception("Error Processing Request" . $e->getMessage());
                
            }
        }
        /**
         * A description of the entire PHP function.
         *
         * @param datatype $titulo description
         * @param datatype $descripcion description
         * @param datatype $fecha_inicio description
         * @param datatype $fecha_final description
         * @param datatype $id description
         * @throws Exception description of exception
         * @return bool
         */
        public function setActualizarProyecto(
            $titulo,
            $descripcion,
            $fecha_inicio,
            $fecha_final,
            $id
        ){
            try{
                $sql = "UPDATE proyectos SET titulo = ?, descripcion = ?, fecha_inicio = ?, fecha_final = ? WHERE id_proyecto = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute([$titulo, $descripcion, $fecha_inicio, $fecha_final, $id]);
                if($stmt){
                    return true;
                }else{
                    return false;
                }
            }catch(PDOException $e){
                throw new Exception("Error Processing Request" . $e->getMessage());
                
            }
        }
    }
?>