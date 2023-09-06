<?php  

include "../fungsi/koneksi.php";

if(isset($_POST['simpan'])) {

	$jenis_kendaraan = $_POST['jenis_kendaraan'];	
	$harga = preg_replace('/[Rp.]/', '', $_POST['harga']);

//script validasi data

	$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM biaya WHERE jenis_kendaraan='$jenis_kendaraan'"));
	if ($cek > 0){
		echo "<script>window.alert('Jenis Kendaraan Sudah Ada')
		window.location='index.php?p=biaya'</script>";
	}else {
		$query = "INSERT into biaya (jenis_kendaraan, harga) VALUES 
		('$jenis_kendaraan', '$harga')

		";
		$hasil = mysqli_query($koneksi, $query);
		if ($hasil) {
			echo "<script>window.alert('Data Berhasil Disimpan')
			window.location='index.php?p=biaya'</script>";
		} else {
			echo ("ada kesalahan : " . mysqli_error($koneksi));
		}
	}
} 
?>