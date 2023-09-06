 
<?php 

$page = isset($_GET['p']) ? $_GET['p'] : "";

if ($page == 'formpesan') {
    include_once "formpesan.php";
} else if ($page=="") {
    include_once "main.php";
} else if ($page=="user") {
    include_once "user.php";
}  else if ($page=="user_tambah") {
    include_once "user_tambah.php";
}  else if ($page=="user_edit") {
    include_once "user_edit.php";
} else if ($page=="user_hapus") {
    include_once "user_hapus.php";
} else if ($page=="biaya") {
    include_once "biaya.php";
} else if ($page=="biaya_tambah") {
    include_once "biaya_tambah.php";
} else if ($page=="biaya_simpan") {
    include_once "biaya_simpan.php";
} else if ($page=="biaya_edit") {
    include_once "biaya_edit.php";
} else if ($page=="biaya_hapus") {
    include_once "biaya_hapus.php";
} else if ($page=="laporan") {
    include_once "laporan.php";
}
?>

