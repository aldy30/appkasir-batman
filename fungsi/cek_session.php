<?php
if(isset($_SESSION['level']))
{
	
	$sesen_username = $_SESSION['username'];
	$sesen_level = $_SESSION['level'];
	
}
else{
	die("<script>alert('Anda tidak memiliki akses!');history.go(-1)</script>");
}
?>
