<?php
//Llamada al modelo
require_once("models/VoterModel.php");


class VoterController{
    public function saveForm($datos){
        // Crear una instancia del modelo
        $formModel = new VoterModel();
        //echo $datos['options'];
        // Llamar al método del modelo para guardar los datos
        $formModel->saveForm($datos);

        // Redireccionar a alguna vista o página
        header('Location: views/form.php');
    }
}


?>