<?php
    require_once '../models/VoterModel.php';

    $voter = new VoterModel();
    $region_id = $_POST["region_id"];
    $query = $voter->getCommunes($region_id);
    echo json_encode($query);
?>