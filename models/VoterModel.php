<?php
require_once "Connection.php";

class VoterModel extends Connection{

    public function __construct(){
        parent::__construct();
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

            $sqlSearch = "SELECT * FROM votes WHERE rut = ".$rutDebugged;
            $result = $this->conexion_db->query($sqlSearch);

            if($result){
                $row = $result->fetch_assoc();
                $rutSearch = $row['rut'];
                if(is_string($rutSearch)){
                    $this->conexion_db->close();
                    return false;
                }
            }

            $sqlInsert = "INSERT INTO votes (names, alias, rut, email, region_id, commune_id, candidate_id, options) VALUES('$name','$alias','$rutDebugged','$email','$region_id','$commune_id','$candidate_id','$opcionesEscapadas')";
            $result = $this->conexion_db->query($sqlInsert);

            if ($result) {
                $this->conexion_db->close();
                return true;
            } else {
                throw new Exception("Error al guardar la votación." . $this->conexion->error);
            }
        } catch (Exception $ex) {
            return false;
        }
    }
}
?>
