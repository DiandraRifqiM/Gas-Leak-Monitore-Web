<?php

header('Content-Type: application/json');

require_once '../config/database.php';

/* MQ2 */
$mq2 =
$conn->query(
"SELECT gas_val
 FROM mq2
 ORDER BY mq2_id DESC
 LIMIT 1"
)->fetch_assoc();

/* MQ135 */
$mq135 =
$conn->query(
"SELECT air_val
 FROM mq135
 ORDER BY mq135_data_id DESC
 LIMIT 1"
)->fetch_assoc();

/* DHT11 */
$dht =
$conn->query(
"SELECT temp, humid
 FROM dht11
 ORDER BY dht_data_id DESC
 LIMIT 1"
)->fetch_assoc();

echo json_encode([
    "gas_val" => $mq2["gas_val"],
    "air_val" => $mq135["air_val"],
    "temp" => $dht["temp"],
    "humid" => $dht["humid"]
]);