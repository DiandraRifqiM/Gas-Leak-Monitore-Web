let currentFilter = "all";

const filterBtn = document.getElementById("filterBtn");

const filterMenu = document.getElementById("filterMenu");

/* Toggle Menu */

filterBtn.addEventListener("click", () => {
  filterMenu.classList.toggle("show");
});

/* Filter Click */

document.querySelectorAll("#filterMenu button").forEach((btn) => {
  btn.addEventListener("click", () => {
    currentFilter = btn.dataset.sensor;

    filterMenu.classList.remove("show");

    loadAlert();
  });
});

/* Load Alert */

function loadAlert() {
  fetch("api/get_alert.php")
    .then((response) => response.json())
    .then((data) => {
      let html = "";

      const filteredData =
        currentFilter === "all"
          ? data
          : data.filter((item) => item.sensor_name === currentFilter);

      filteredData.forEach((alert, index) => {
        let statusClass = "";

        if (alert.status === "SAFE") {
          statusClass = "safe";
        } else if (alert.status === "WARNING") {
          statusClass = "warning";
        } else {
          statusClass = "danger";
        }

        html += `
        <tr>

            <td>
                <span class="number">
                    ${index + 1}
                </span>
            </td>

            <td>
                <span class="time">
                    ${alert.created_at}
                </span>
            </td>

            <td>
                <span class="sensor">
                    ${alert.sensor_name}
                </span>
            </td>

            <td>
                ${alert.sensor_data}
            </td>

            <td>
                <span class="${statusClass}">
                    ${alert.status}
                </span>
            </td>

            <td>
                ${alert.message}
            </td>

        </tr>
        `;
      });

      document.getElementById("alertTable").innerHTML = html;
    });
}

loadAlert();

setInterval(loadAlert, 5000);
