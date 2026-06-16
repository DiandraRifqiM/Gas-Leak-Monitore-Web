<?php
require_once 'auth/check_auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Monitore</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="Assets/css/history.css">
</head>

<body>

<section class="app">

    <!-- Sidebar -->
    <aside class="sidebar">

        <!-- Logo / Header -->
        <header>
            <i class='bx bxs-chip'></i>
            <span>GLD System</span>
        </header>

        <!-- Navigation -->
        <nav class="sidebar-nav">
            <ul>

                <li>
                    <a href="index.php">
                        <i class='bx bx-grid-alt'></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="history.php" class="active">
                        <i class='bx bx-history'></i>
                        <span>History</span>
                    </a>
                </li>

                <li>
                    <a href="alert.php">
                        <i class='bx bx-error-circle'></i>
                        <span>Alert</span>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- Logout -->
        <div class="sidebar-footer">
            <a href="logout.php" class="logout-btn">
                <i class='bx bx-log-out'></i>
                <span>Logout</span>
            </a>
        </div>
    </aside>
    <main class="main-content">

    <div class="page-header">
        <h1>History</h1>
        <p>Sensors Data Records</p>
    </div>


    <div class="table-card">

        <table>

            <thead>
                <tr>
                    <th>No</th>
                    <th>Time</th>
                    <th>MQ2 Gas</th>
                    <th>MQ135 Air</th>
                    <th>Temperature</th>
                    <th>Humidity</th>
                </tr>
            </thead>


            <tbody id="historyTable">

            </tbody>


        </table>

    </div>


</main>


<script src="Assets/js/history.js"></script>
</section>

</body>
</html>