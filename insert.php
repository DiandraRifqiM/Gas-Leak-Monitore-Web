<?php

require_once 'Config/database.php';

echo "Connected!";

// $servername = "127.0.0.1";
// $username = "root";
// $password = "";
// $dbname = "projek_akhir";

// $conn = new mysqli($servername, $username, $password, $dbname, 3307 );

// if ($conn->connect_error) {
//     die("Connection Failed: " . $conn->connect_error);
// }

// MQ2
if (isset($_POST['gas_val'])) {

    $gas_value = (int)$_POST['gas_val'];

    $query = "INSERT INTO mq2 (gas_val) VALUES ($gas_value)";

    if ($conn->query($query) === TRUE) {
        echo "Data sent successfully!";

        // MQ2 Alert
        if($gas_value > 80){
            $conn->query("INSERT INTO alert (sensor_name, sensor_data, status, message)
            VALUES ('MQ2', '$gas_value', 'DANGER', 'Gas Leaked Detected!')");
        }elseif($gas_value > 70){
            $conn->query("INSERT INTO alert (sensor_name, sensor_data, status, message)
            VALUES ('MQ2', '$gas_value', 'WARNING', 'High Gas Concentration!')");
        }
    } else {
        echo "MQ135 Failed Send Data!!!" . $conn->error . "<br>";
    }
}

// DHT11
if(
    isset($_POST['humid']) &&
     isset($_POST['temp'])
){
    $humid = (float)$_POST['humid'];
    $temp = (float)$_POST['temp'];

    $query2 = "INSERT INTO dht11 (humid, temp) VALUES ($humid, $temp)";
    if($conn->query($query2) === TRUE){
        echo "\nDHT11 Data Sent!";
    }else{
        echo "\nDHT11 Failed Send Data!!!" . $conn->error;
    }
}

// MQ135
if(isset($_POST['air_val'])){
    $air_val = (int)$_POST['air_val'];

    $query3 = "INSERT INTO mq135 (air_val) VALUES ($air_val)";
    if($conn -> query($query3) === TRUE){
        echo "\nMQ135 Data Sent!";
        
        // MQ135 Alert
        if($air_val > 80){
            $conn->query("INSERT INTO alert (sensor_name, sensor_data, status, message)
            VALUES ('MQ135', '$air_val', 'DANGER', 'Toxic Air Quality!')");
        }elseif($air_val > 70){
            $conn->query("INSERT INTO alert (sensor_name, sensor_data, status, message)
            VALUES ('MQ135', '$air_val', 'WARNING', 'Air Quality Contaminated!')");
        }
    }else{
        echo "\nMQ135 Failed Send Data!!!" . $conn->error;
    }
}

// if(isset($_POST['']))

$conn->close();

?>