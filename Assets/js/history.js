function loadHistory() {
  fetch("api/get_history.php")
    .then((response) => response.json())

    .then((data) => {
      let html = "";
      let no = 1;

      data.forEach((row) => {
        html += `
    
    <tr>
    
    <td>
    <span class="number">
    ${no++}
    </span>
    </td>
    
    
    <td>
    <div class="time">
    ${row.time}
    </div>
    </td>
    
    
    <td>
    
    ${
      row.gas
        ? `<span class="badge gas">
    ${row.gas}%
    </span>`
        : `<span class="empty">-</span>`
    }
    
    </td>
    
    
    
    <td>
    
    ${
      row.air
        ? `<span class="badge air">
    ${row.air}%
    </span>`
        : `<span class="empty">-</span>`
    }
    
    </td>
    
    
    
    
    <td>
    
    ${
      row.temp
        ? `<span class="badge temp">
    ${row.temp}°C
    </span>`
        : `<span class="empty">-</span>`
    }
    
    </td>
    
    
    
    
    <td>
    
    ${
      row.humid
        ? `<span class="badge humid">
    ${row.humid}%
    </span>`
        : `<span class="empty">-</span>`
    }
    
    </td>
    
    
    </tr>
    
    `;
      });

      document.getElementById("historyTable").innerHTML = html;
    });
}

loadHistory();

setInterval(loadHistory, 5000);
