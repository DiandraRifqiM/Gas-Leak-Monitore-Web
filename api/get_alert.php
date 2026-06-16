<?php 
    header('Content-Type: application/json');

    require_once '../Config/database.php';

    $result = $conn->query("SELECT * FROM alert ORDER BY alert_data_id DESC LIMIT 50");

    $data = [];

    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }

    echo json_encode($data);
?>