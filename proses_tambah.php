<?php 
include 'koneksi.php';

$nama_lokasi = mysqli_real_escape_string($host, $_POST['nama_lokasi']);
$latitude = mysqli_real_escape_string($host, $_POST['latitude']);
$longitude = mysqli_real_escape_string($host, $_POST['longitude']);

$query = "INSERT INTO lokasi (nama_lokasi, latitude, longitude) VALUES ('$nama_lokasi', '$latitude', '$longitude')";

// Memeriksa apakah query berhasil dijalankan
if(mysqli_query($host, $query)) {
    // Jika berhasil, tampilkan popup sukses dan kembali ke halaman tambah.php
    echo '<script>alert("Data berhasil ditambahkan."); window.location.href="tambah.php?pesan=input";</script>';
} else {
    // Jika gagal, tampilkan popup error dan kembali ke halaman tambah.php
    echo '<script>alert("Error: ' . mysqli_error($host) . '"); window.location.href="tambah.php?pesan=error";</script>';
}

// Tutup koneksi ke database (jangan tutup koneksi di sini agar popup tetap muncul)
mysqli_close($host);
?>
