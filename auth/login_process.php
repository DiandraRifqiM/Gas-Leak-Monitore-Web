<?php

session_start();

require_once '../Config/database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$query = $conn->query("
SELECT *
FROM users
WHERE username = '$username'
LIMIT 1
");

if($query->num_rows > 0){

    $user = $query->fetch_assoc();

    if(password_verify($password,$user['password'])){

        $_SESSION['login'] = true;
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_id'] = $user['user_id'];

        header("Location: ../index.php");
        exit;
    }
}

header("Location: ../login.php");
exit;
