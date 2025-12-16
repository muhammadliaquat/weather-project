let chart;

function insert() {
  fetch('/weather-project/api/index.php?action=insert', {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({
      city: i_city.value,
      country: "Romania",
      date: "2024-01-01",
      temperature: Number(i_temp.value),
      rainfall: Number(i_rain.value),
      season: "Winter"
    })
  }).then(r => r.json()).then(alertDone);
}

function search() {
  fetch(`/weather-project/api/index.php?action=search&city=${s_city.value}`)
    .then(r => r.json())
    .then(d => searchResult.textContent = JSON.stringify(d, null, 2));
}

function update() {
  fetch(`/weather-project/api/index.php?action=update&id=${u_id.value}`, {
    method: 'POST',
    headers: {'Content-Type': 'application/json'},
    body: JSON.stringify({ temperature: Number(u_temp.value) })
  }).then(r => r.json()).then(alertDone);
}

function del() {
  fetch(`/weather-project/api/index.php?action=delete&id=${d_id.value}`, {
    method: 'DELETE'
  }).then(r => r.json()).then(alertDone);
}

function hot() {
  fetch('/weather-project/api/index.php?action=hot')
    .then(r => r.json())
    .then(drawChart);
}

function drawChart(data) {
  const labels = data.aggregations.hot.buckets.map(b => b.key);
  const values = data.aggregations.hot.buckets.map(b => b.max_temp.value);

  if (chart) chart.destroy();
  chart = new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
      labels,
      datasets: [{ label: 'Max Temp', data: values }]
    }
  });
}

function alertDone() {
  alert("Operation completed successfully");
}
