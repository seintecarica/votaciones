<?php
    require_once '../models/VoterModel.php';

    $voter = new VoterModel();
    $query = $voter->getCandidates();
    echo json_encode($query);
?>