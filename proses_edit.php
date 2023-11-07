<?php 
include 'koneksi.php';

// Mendapatkan data dari form
$no = mysqli_real_escape_string($host, $_POST['no']);
$nama_lokasi = mysqli_real_escape_string($host, $_POST['nama_lokasi']);
$latitude = mysqli_real_escape_string($host, $_POST['latitude']);
$longitude = mysqli_real_escape_string($host, $_POST['longitude']);

$query = "UPDATE lokasi SET nama_lokasi='$nama_lokasi', latitude='$latitude', longitude='$longitude' WHERE no='$no'";

// Memeriksa apakah query berhasil dijalankan
if(mysqli_query($host, $query)) {
    // Jika berhasil, redirect ke halaman index dengan pesan sukses
    echo '<script>alert("Data berhasil diedit."); window.location.href="tambah.php?pesan=input";</script>';
} else {
    // Jika gagal, redirect ke halaman index dengan pesan error
    echo '<script>alert("Error: ' . mysqli_error($host) . '"); window.location.href="tambah.php?pesan=error";</script>';
}

// Tutup koneksi ke database
mysqli_close($host);
?>
