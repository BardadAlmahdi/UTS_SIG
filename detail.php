<!DOCTYPE html>
<html lang="en">

<head>
    <base target="_top">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Lokasi - Leaflet Map</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
    <link rel="shortcut icon" type="image/x-icon" href="docs/images/favicon.ico" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        
        .leaflet-container {
            height: 400px;
            width: 80%;
            max-width: 800px;
            margin: 20px auto;
            border: 1px solid #ccc;
            border-radius: 5px;
        }


        .popup-content {
            text-align: center;
        }

        .popup-content h2 {
            margin: 0 0 10px;
            font-size: 18px;
        }

        .popup-content p {
            margin: 0;
            font-size: 14px;
            color: #555;
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

    <?php 
    include 'koneksi.php';

    // Mendapatkan nomor lokasi dari URL menggunakan metode GET
    $no = $_GET['id'];

    // Query untuk mendapatkan data lokasi berdasarkan nomor
    $query = mysqli_query($host, "SELECT * FROM lokasi WHERE no='$no'");
    if ($query) {
        // Jika query berhasil, ambil data dan isi variabel
        $data = mysqli_fetch_assoc($query);
        $nama_lokasi = $data['nama_lokasi'];
        $latitude = $data['latitude'];
        $longitude = $data['longitude'];
    } else {
        // Jika query gagal, beri nilai default pada variabel
        $nama_lokasi = '';
        $latitude = '';
        $longitude = '';
    }

    // Tutup koneksi ke database
    mysqli_close($host);
    ?>

    

    <div id="map" class="leaflet-container"></div>
    
    <div class="text-center mt-3 d-flex justify-content-center">
                <a class="btn btn-primary mx-2" href="index.php">Kembali ke Home</a>
                <a class="btn btn-secondary mx-2" href="tambah.php">Kembali ke Daftar Lokasi</a>
     </div>

    

    <script>
        const map = L.map('map').setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>], 13);
        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const marker = L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>]).addTo(map)
            .bindPopup('<div class="popup-content"><h2><?php echo $nama_lokasi; ?></h2><p>Latitude: <?php echo $latitude; ?><br />Longitude: <?php echo $longitude; ?></p></div>')
            .openPopup();
    </script>

</body>

</html>
