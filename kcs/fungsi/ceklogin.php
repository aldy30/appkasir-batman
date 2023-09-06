<?php  

	if (isset($_SESSION['login'])) {
		if ($_SESSION['level'] == "admin") {
			header("location:admin/index.php");
		} else if ($_SESSION['level'] == "kasir"){
			header("location:kasir/index.php");
		} else {
			header("location:index.php");
		}
	}

?>