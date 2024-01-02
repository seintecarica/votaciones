<?php
require_once "Connection.php";

class VoterModel extends Connection{
    //private $conn;

    public function __construct(){
        //$this->conn = new Connection();
        parent::__construct();
        //$this->conn->connect();
    }
    
    public function getRegions(){
        $sql = 'SELECT * FROM region';
        $arrayRegions = array();

        if($result = $this->conexion_db->query($sql)){
            while($rows = $result->fetch_assoc()){
                $arrayRegions[] = $rows;
            }
            return $arrayRegions;
            $this->conexion_db->close();
        }
    }

    public function getCommunes($region_id){
        $sql = "SELECT * FROM commune WHERE region_id = ".$region_id;
        $arrayCommunes = array();
        if($result = $this->conexion_db->query($sql)){
            while($rows = $result->fetch_assoc()){
                $arrayCommunes[] = $rows;
            }
            return $arrayCommunes;
            $this->conexion_db->close();
        }
    }

    public function getCandidates(){
        $sql = 'SELECT * FROM candidate';
        $arrayCandidates = array();

        if($result = $this->conexion_db->query($sql)){
            while($rows = $result->fetch_assoc()){
                $arrayCandidates[] = $rows;
            }
            return $arrayCandidates;
            $this->conexion_db->close();
        }
    }

    public function saveForm($datos){
        try{
            $name = $datos['name'];
            $alias = $datos['alias'];
            $rut = $datos['rut'];
            $email = $datos['email'];
            $region_id = $datos['region_id'];
            $commune_id = $datos['commune_id'];
            $candidate_id = $datos['candidate_id'];
            $opcionesEscapadas = implode(',', array_map(array($this->conexion_db, 'real_escape_string'), $datos['options']));

            $rutDebugged = str_replace("-", "", $rut);
            $rutDebugged = str_replace(".", "", $rutDebugged);

            $sql = "SELECT * FROM votes WHERE rut = ".$rutDebugged;
            if($result = $this->conexion_db->query($sql)){
                $this->conexion_db->close();
                return false;
            }

            $sql = "INSERT INTO votes (names, alias, rut, email, region_id, commune_id, candidate_id, options) VALUES('$name','$alias','$rutDebugged','$email','$region_id','$commune_id','$candidate_id','$opcionesEscapadas')";
            $result = $this->conexion_db->query($sql);

            if ($result) {
                // Registro guardado exitosamente
                $this->conexion_db->close();
                return true;
            } else {
                // Manejar el error en caso de fallo en la inserción
                throw new Exception("Error al guardar la votación." . $this->conexion->error);
            }
        } catch (Exception $ex) {
            // Manejar la excepción, puedes registrarla, mostrar un mensaje al usuario, etc.
            return false;
        }
    }
}
?>
