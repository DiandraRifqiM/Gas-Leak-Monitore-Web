// =========================
// CHARTS
// =========================

const mq2Chart = new Chart(document.getElementById("mq2Chart"), {
  type: "line",
  data: {
    labels: [],
    datasets: [
      {
        label: "MQ2 Gas",
        data: [],
        borderColor: "#06b6d4",
        backgroundColor: "rgba(6,182,212,0.2)",
        borderWidth: 3,
        tension: 0.4,
        fill: true,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
  },
});

const mq135Chart = new Chart(document.getElementById("mq135Chart"), {
  type: "line",
  data: {
    labels: [],
    datasets: [
      {
        label: "MQ135 Air Quality",
        data: [],
        borderColor: "#10b981",
        backgroundColor: "rgba(16,185,129,0.2)",
        borderWidth: 3,
        tension: 0.4,
        fill: true,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
  },
});

const climateChart = new Chart(document.getElementById("climateChart"), {
  type: "line",
  data: {
    labels: [],
    datasets: [
      {
        label: "Temperature",
        data: [],
        borderColor: "#f97316",
        backgroundColor: "rgba(249,115,22,0.15)",
        borderWidth: 3,
        tension: 0.4,
      },
      {
        label: "Humidity",
        data: [],
        borderColor: "#3b82f6",
        backgroundColor: "rgba(59,130,246,0.15)",
        borderWidth: 3,
        tension: 0.4,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
  },
});

// =========================
// LOAD DATA
// =========================

function loadData() {
  fetch("api/get_latest.php")
    .then((response) => response.json())
    .then((data) => {
      // =========================
      // UPDATE CARDS
      // =========================

      document.getElementById("gasVal").innerText = data.gas_val + "%";

      document.getElementById("airVal").innerText = data.air_val + "%";

      document.getElementById("tempVal").innerText = data.temp + "°C";

      document.getElementById("humidVal").innerText = data.humid + "%";

      // =========================
      // TIME LABEL
      // =========================

      const now = new Date().toLocaleTimeString();

      // =========================
      // MQ2
      // =========================

      mq2Chart.data.labels.push(now);

      mq2Chart.data.datasets[0].data.push(Number(data.gas_val));

      if (mq2Chart.data.labels.length > 20) {
        mq2Chart.data.labels.shift();
        mq2Chart.data.datasets[0].data.shift();
      }

      mq2Chart.update();

      // =========================
      // MQ135
      // =========================

      mq135Chart.data.labels.push(now);

      mq135Chart.data.datasets[0].data.push(Number(data.air_val));

      if (mq135Chart.data.labels.length > 20) {
        mq135Chart.data.labels.shift();
        mq135Chart.data.datasets[0].data.shift();
      }

      mq135Chart.update();

      // =========================
      // CLIMATE
      // =========================

      climateChart.data.labels.push(now);

      climateChart.data.datasets[0].data.push(Number(data.temp));

      climateChart.data.datasets[1].data.push(Number(data.humid));

      if (climateChart.data.labels.length > 20) {
        climateChart.data.labels.shift();

        climateChart.data.datasets[0].data.shift();
        climateChart.data.datasets[1].data.shift();
      }

      climateChart.update();

      // =========================
      // SYSTEM STATUS
      // =========================

      const status = document.getElementById("systemStatus");

      if (Number(data.gas_val) > 70 || Number(data.air_val) > 70) {
        status.innerText = "DANGER";
        status.style.color = "#ef4444";
      } else {
        status.innerText = "SAFE";
        status.style.color = "#10b981";
      }
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

// =========================
// START
// =========================

loadData();

setInterval(loadData, 5000);
