 
<?php 

$page = isset($_GET['p']) ? $_GET['p'] : "";

if ($page == 'formpesan') {
	include_once "formpesan.php";
} else if ($page=="") {
	include_once "main.php";
} else if ($page=="transaksi") {
	include_once "transaksi.php";
} else if ($page=="transaksi_tambah") {
	include_once "transaksi_tambah.php";
} else if ($page=="transaksi_simpan") {
	include_once "transaksi_simpan.php";
} else if ($page=="laporan") {
	include_once "laporan.php";
} 

?>

