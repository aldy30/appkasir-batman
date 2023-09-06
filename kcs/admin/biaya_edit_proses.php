<?php  

include "../fungsi/koneksi.php";

if(isset($_POST['update'])) {
	$id = $_POST['id'];
	
	$jenis_kendaraan = $_POST['jenis_kendaraan'];
	$harga = preg_replace('/[Rp.]/', '', $_POST['harga']);
	
	
	$query = mysqli_query($koneksi, "UPDATE biaya SET jenis_kendaraan='$jenis_kendaraan', harga='$harga' WHERE id_biaya ='$id' ");
	
	if ($query) {
		echo '<script language="javascript">alert("Data Berhasil Di Ubah !!!"); document.location="index.php?p=biaya";</script>';
	} else {
		echo 'error' . mysqli_error($koneksi);
	}

}



?>