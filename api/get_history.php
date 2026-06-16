<?php

header('Content-Type: application/json');

require_once '../config/database.php';


$data = [];


// MQ2
$q1 = $conn->query("
SELECT 
gas_val,
created_at
FROM mq2
ORDER BY mq2_id DESC
LIMIT 50
");


while($row = $q1->fetch_assoc()){

    $data[] = [
        "time"=>$row['created_at'],
        "gas"=>$row['gas_val'],
        "air"=>null,
        "temp"=>null,
        "humid"=>null
    ];

}


// MQ135
$q2 = $conn->query("
SELECT
air_val,
created_at
FROM mq135
ORDER BY mq135_data_id DESC
LIMIT 50
");


while($row = $q2->fetch_assoc()){

    $data[] = [
        "time"=>$row['created_at'],
        "gas"=>null,
        "air"=>$row['air_val'],
        "temp"=>null,
        "humid"=>null
    ];

}


// DHT11
$q3 = $conn->query("
SELECT
temp,
humid,
created_at
FROM dht11
ORDER BY dht_data_id DESC
LIMIT 50
");


while($row = $q3->fetch_assoc()){

    $data[] = [
        "time"=>$row['created_at'],
        "gas"=>null,
        "air"=>null,
        "temp"=>$row['temp'],
        "humid"=>$row['humid']
    ];

}


// urutkan berdasarkan waktu terbaru
usort($data,function($a,$b){

    return strtotime($b['time']) - strtotime($a['time']);

});


echo json_encode(array_slice($data,0,50));