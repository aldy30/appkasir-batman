<?php  
session_start();
include "../fungsi/koneksi.php";

if(isset($_POST['simpan'])) {

	$no_nota = $_POST['no_nota'];
	$id_biaya = $_POST['id_biaya'];
	$bayar = $_POST['bayar'];		
	$kembali = preg_replace('/[Rp.]/', '', $_POST['kembali']);
	$total = $_POST['total'];
	$nama_plg = $_POST['nama_plg'];
	$tanggal = date('Y-m-d');
	$id_user = $_SESSION['id_user'];

//script validasi data

	$cek = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM transaksi WHERE no_nota='$no_nota'"));
	if ($cek > 0){
		echo "<script>window.alert('Data Sudah Ada')
		window.location='index.php?p=transaksi'</script>";
	}else {
		$query = "INSERT into transaksi (no_nota, id_biaya, bayar,  kembali, total, nama_plg, tanggal, id_user) VALUES 
		('$no_nota', '$id_biaya', '$bayar', '$kembali','$total', '$nama_plg', '$tanggal','$id_user')

		";
		$hasil = mysqli_query($koneksi, $query);
		if ($hasil) {
			header("location:index.php?p=transaksi");
		} else {
			die("ada kesalahan : " . mysqli_error($koneksi));
		}
	}
} 
?>