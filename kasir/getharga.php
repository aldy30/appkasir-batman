<?php  

include "../fungsi/koneksi.php";

$id_biaya = $_POST['kode'];

$query = mysqli_query($koneksi,"select * from biaya WHERE id_biaya='$id_biaya'");

if (mysqli_num_rows($query)) {
	$row = mysqli_fetch_assoc($query);
	echo ($row['harga']);
}

?>