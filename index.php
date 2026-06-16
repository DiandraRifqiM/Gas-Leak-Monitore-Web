<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gas Monitor</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="Assets/css/style.css">
</head>

<body>

<section class="app">

    <!-- Sidebar -->
    <aside class="sidebar">

        <header>
            <i class='bx bxs-chip'></i>
            <span>IoT Dashboard</span>
        </header>

        <nav class="sidebar-nav">
            <ul>

                <li>
                    <a href="index.php" class="active">
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
                    <a href="alert.php">
                        <i class='bx bx-error-circle'></i>
                        <span>Alert</span>
                    </a>
                </li>

            </ul>
        </nav>

        <div class="sidebar-footer">
            <a href="logout.php" class="logout-btn">
                <i class='bx bx-log-out'></i>
                <span>Logout</span>
            </a>
        </div>

    </aside>

    <!-- Main Content -->
    <main class="main-content">

        <div class="page-header">
            <h1>Dashboard</h1>
            <p>Industrial Gas Monitoring System</p>
        </div>

        <!-- Sensor Cards -->
        <div class="sensor-cards">

            <div class="card">
                <h3>MQ2 Gas</h3>
                <h2 id="gasVal">--%</h2>
            </div>

            <div class="card">
                <h3>MQ135 Air</h3>
                <h2 id="airVal">--%</h2>
            </div>

            <div class="card">
                <h3>Temperature</h3>
                <h2 id="tempVal">--°C</h2>
            </div>

            <div class="card">
                <h3>Humidity</h3>
                <h2 id="humidVal">--%</h2>
            </div>

        </div>

        <!-- Status -->
        <div class="status-card">
            <h3>System Status</h3>
            <span id="systemStatus">SAFE</span>
        </div>

        <!-- Charts -->
        <div class="charts">

            <div class="chart-card">
                <h3>MQ2 Gas Trend</h3>
                <canvas id="mq2Chart"></canvas>
            </div>

            <div class="chart-card">
                <h3>MQ135 Air Quality Trend</h3>
                <canvas id="mq135Chart"></canvas>
            </div>

            <div class="chart-card chart-wide">
                <h3>Temperature & Humidity Trend</h3>
                <canvas id="climateChart"></canvas>
            </div>

        </div>

    </main>

</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="Assets/js/dashboard.js"></script>

</body>
</html>