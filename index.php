<?php
    require_once "controllers/VoterController.php";
    // Instancia del controlador
    $formController = new VoterController();

    // Verificar si se ha enviado el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Procesar el formulario
        $formController->saveForm($_POST);
    } else {
        // Mostrar la vista del formulario
        header('Location: views/form.php');
    }
?>
