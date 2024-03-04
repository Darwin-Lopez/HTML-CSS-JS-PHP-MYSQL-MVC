<?php
    class ConexionMYSQL{
        private $host = "localhost";
        private $usuario = "root";
        private $pass = "";
        private $db = "sesion";
        private $conn;
        /**
         * Constructor for establishing a connection to the database.
         *
         * @throws Exception Error Processing Request
         */
        public function __construct()
        {   
            try{
                $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->usuario, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                throw new Exception("Error Processing Request". $e->getMessage());
                
            }
        }
        /**
         * This function returns the connection.
         *
         * @return mixed
         */
        public function getConexion(){
            return $this->conn;
            
        }
    }

?>