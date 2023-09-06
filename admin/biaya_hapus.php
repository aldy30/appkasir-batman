<?php
include "../fungsi/koneksi.php";

if(isset($_GET['id'])){
	$id=$_GET['id'];
	
	$query = mysqli_query($koneksi,"delete from biaya where id_biaya='$id'");
	if ($query) {
		echo '<script language="javascript">alert("Data Berhasil Di Hapus !!!"); document.location="index.php?p=biaya";</script>';
	} else {
		echo 'gagal';
	}
	
}
?>