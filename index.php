<!DOCTYPE html>
<html lang="en">
<head>
	<base target="_top">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	
	<title>Leaflet Map Demo</title>
	
	<link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

	<style>
		html, body {
			height: 100%;
			margin: 0;
			font-family: Arial, sans-serif;
		}
		#map {
			height: 400px;
			width: 100%;
		}
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			text-align: center;
		}
		.header {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
		}
		.link {
			text-decoration: none;
			color: #4CAF50;
			font-weight: bold;
		}
		.back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
	</style>

</head>
<body>

<div class="container">
	<div class="header">
		<h1>Leaflet Map Demo</h1>
		<a class="link" href="tambah.php">Tambah Data Lokasi</a>
	</div>
	<div id="map"></div>
</div>
<?php include'koneksi.php';?>

	<div class="text-center mt-3 d-flex justify-content-center">
                <a class="btn btn-primary mx-2" href="tambah.php">Tambah data</a>
     </div>


<script>
	const map = L.map('map').setView([-7.036848, 110.602390], 13);
	const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 19,
		attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
	}).addTo(map);

	const marker = L.marker([-7.036848, 110.602390]).addTo(map)
		.bindPopup('<b>Bardad Almahdi!</b><br />32602000017').openPopup();

	map.on('click', function(e) {
		const popup = L.popup()
			.setLatLng(e.latlng)
			.setContent(`You clicked the map at ${e.latlng.toString()}`)
			.openOn(map);
	});
</script>

</body>
</html>
