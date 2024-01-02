<?php
    require_once '../models/VoterModel.php';

    $voter = new VoterModel();
    $query = $voter->getRegions();
    echo json_encode($query);
?>