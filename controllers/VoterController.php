<?php
//Llamada al modelo
require_once("models/VoterModel.php");


class VoterController{
    public function saveForm($datos){
        // Crear una instancia del modelo
        $formModel = new VoterModel();
        //echo $datos['options'];
        // Llamar al método del modelo para guardar los datos
        if($formModel->saveForm($datos)){
            $_SESSION['mensaje'] = "Registro guardado exitosamente.";
        }
        else{
            $_SESSION['mensaje'] = "Rut ya registrado.";
        }
        //include('views/form.php');
        header('Location: views/form.php');
    }
}


?>
