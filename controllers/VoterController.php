<?php
//Llamada al modelo
require_once("models/VoterModel.php");


class VoterController{
    public function saveForm($datos){
        // Crear una instancia del modelo
        $formModel = new VoterModel();
        // Llamar al método del modelo para guardar los datos
        if($formModel->saveForm($datos)){
            $_SESSION['mensaje'] = "Registro guardado exitosamente.";
        }
        else{
            $_SESSION['mensaje'] = "Rut ya registrado.";
        }
        header('Location: views/form.php');
    }
}


?>
