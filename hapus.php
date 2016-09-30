<?php
include 'config.php';
if(isset($_GET['nama_file'])) {
	$query->exec("DELETE FROM download WHERE nama_file = ''$_GET[nama_file'");
}
header("location:download.php")
?>