<?php
include "koneksi.php";

if(isset($_GET['id'])){
    $no = $_GET['id'];
    $query = mysqli_query($host, "SELECT * FROM lokasi WHERE no='$no'");
    $data = mysqli_fetch_array($query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leaflet Map dengan Bootstrap</title>
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Form Edit Lokasi</h2>
        <form method="post" action="proses_edit.php">
        <input type="hidden" name="no" value="<?php echo $data['no'] ?>">
            <div class="mb-3">
                <label for="lokasi" class="form-label">Nama Lokasi:</label>
                <input type="text" class="form-control" id="lokasi" name="nama_lokasi" value="<?php echo $data['nama_lokasi']; ?>">
            </div>
            <div class="mb-3">
                <label for="lat" class="form-label">Latitude:</label>
                <input type="text" class="form-control" id="lat" name="latitude" value="<?php echo $data['latitude']; ?>">
            </div>
            <div class="mb-3">
                <label for="long" class="form-label">Longitude:</label>
                <input type="text" class="form-control" id="long" name="longitude" value="<?php echo $data['longitude']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mVnPpAUwVRK1Q01jx3OY6nG7pOVXCk2rYDk6PzUpJ70jww7FrfPpB0Jpm6i5v1xS" crossorigin="anonymous"></script>
</body>

</html>
