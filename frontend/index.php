<!DOCTYPE html>
<html>
<head>
  <title>Weather Management System</title>
  <link rel="stylesheet" href="style.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

<h1>Weather Data Management</h1>

<section>
<h2>Insert Weather</h2>
<input id="i_city" placeholder="City">
<input id="i_temp" placeholder="Temperature">
<input id="i_rain" placeholder="Rainfall">
<button onclick="insert()">Insert</button>
</section>

<section>
<h2>Search Weather</h2>
<input id="s_city" placeholder="City">
<button onclick="search()">Search</button>
<pre id="searchResult"></pre>
</section>

<section>
<h2>Update Weather</h2>
<input id="u_id" placeholder="Document ID">
<input id="u_temp" placeholder="New Temperature">
<button onclick="update()">Update</button>
</section>

<section>
<h2>Delete Weather</h2>
<input id="d_id" placeholder="Document ID">
<button onclick="del()">Delete</button>
</section>

<section>
<h2>Analytics</h2>
<button onclick="hot()">Top Hot Cities</button>
<canvas id="chart"></canvas>
</section>

<script src="app.js"></script>
</body>
</html>
