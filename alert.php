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
    <link rel="stylesheet" href="Assets/css/alert.css">
</head>

<body>

<section class="app">

    <!-- Sidebar -->
    <aside class="sidebar">

        <!-- Logo / Header -->
        <header>
            <i class='bx bxs-chip'></i>
            <span>Alert History</span>
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
                    <a href="history.php">
                        <i class='bx bx-history'></i>
                        <span>History</span>
                    </a>
                </li>

                <li>
                    <a href="alert.php" class="active">
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
</section>

</body>
</html>