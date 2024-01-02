<?php
    define('DB_HOST', 'localhost');
    define('DB_USUARIO', 'root');
    define('DB_CONTRA', '');
    define('DB_NOMBRE', 'votes');
    define('DB_CHARSET', 'utf8');

    class Connection{
        protected $conexion_db;

        public function __construct(){
            $this->conexion_db = new mysqli(DB_HOST, DB_USUARIO, DB_CONTRA, DB_NOMBRE);
            $this->conexion_db->set_charset(DB_CHARSET);

            if($this->conexion_db->connect_errno){
                die("Conexión fallida: ".$this->conexion_db->connect_errno);
                return;
            }
        }

        function connect(){
            
        }

        function close(){
            $this->con->close();
        }
    }
    
?>
