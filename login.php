<?php

session_start();

if(isset($_SESSION['login'])){

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

<link rel="stylesheet" href="Assets/css/login.css">

</head>

<body>

<div class="login-container">

    <div class="login-card">

        <div class="logo">

            <i class='bx bxs-chip'></i>

            <h2>GLD System</h2>

            <p>
                Gas Leak Detector Monitoring System
            </p>

        </div>

        <form
        action="auth/login_process.php"
        method="POST">

            <div class="input-group">

                <i class='bx bx-user'></i>

                <input
                type="text"
                name="username"
                placeholder="Username"
                required>

            </div>

            <div class="input-group">

                <i class='bx bx-lock-alt'></i>

                <input
                type="password"
                name="password"
                placeholder="Password"
                required>

            </div>

            <button
            type="submit"
            class="login-btn">

                Login

            </button>

        </form>

    </div>

</div>

</body>
</html>