<?php  

$host = "localhost";
$username = "root";
$password = "12345678";
$database = "kcs";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
	echo "Koneksi gagal " . mysqli_connect_error();
}

?>