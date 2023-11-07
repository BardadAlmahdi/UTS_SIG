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
    <div class="text-center mt-3 d-flex justify-content-left">
                <a class="btn btn-primary mx-2" href="index.php">Home</a>
     </div>

        <h2>Form Lokasi</h2>
        <form action="proses_tambah.php" method="post">
            
            <div class="mb-3">
                <label for="lokasi" class="form-label">Nama Lokasi:</label>
                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi">
            </div>
            <div class="mb-3">
                <label for="lat" class="form-label">Latitude:</label>
                <input type="text" class="form-control" id="latitude" name="latitude">
            </div>
            <div class="mb-3">
                <label for="long" class="form-label">Longitude:</label>
                <input type="text" class="form-control" id="longitude" name="longitude">
            </div>
            <button type="submit" class="btn btn-primary">Kirim Data</button>
        </form>

        <?php 
	include "koneksi.php";
	if(isset($_GET['pesan'])){
		$pesan = $_GET['pesan'];
		if($pesan == "input"){
			echo "Data berhasil di input.";
		}else if($pesan == "update"){
			echo "Data berhasil di update.";
		}else if($pesan == "hapus"){
			echo "Data berhasil di hapus.";
		}
	}
	?>
        <h2 class="mt-5">Daftar Lokasi</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lokasi</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query_mysql = mysqli_query($host, "SELECT * FROM lokasi") or die(mysqli_error($host));
                $no = 1;
                while ($data = mysqli_fetch_array($query_mysql)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama_lokasi']; ?></td>
                        <td><?php echo $data['latitude']; ?></td>
                        <td><?php echo $data['longitude']; ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $data['no']; ?>">Edit</a>
                            <a class="btn btn-danger btn-sm" href="hapus.php?id=<?php echo $data['no']; ?>">Hapus</a>
                            <a class="btn btn-info btn-sm" href="detail.php?id=<?php echo $data['no']; ?>">Detail</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-mVnPpAUwVRK1Q01jx3OY6nG7pOVXCk2rYDk6PzUpJ70jww7FrfPpB0Jpm6i5v1xS" crossorigin="anonymous"></script>
</body>

</html>
