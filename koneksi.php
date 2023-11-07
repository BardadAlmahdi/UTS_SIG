<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "dbpemetaan";
 $host = mysqli_connect($server, $user, $pass, $database);
 if (!$host) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
} else {
//    echo "Koneksi sukses";
}
 ?>
