<?php
include "koneksi.php";

if(isset($_GET['id'])){
    $no = $_GET['id'];
    $query = "DELETE FROM lokasi WHERE no='$no'";
    if (mysqli_query($host, $query)) {
        echo '<script>alert("Data berhasil dihapus."); window.location.href="tambah.php";</script>';
    } else {
        die("Gagal menghapus data: " . mysqli_error($host));
    }
}
?>
