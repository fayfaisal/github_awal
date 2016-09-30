<?php
//koneksi ke database
$dsn  = "mysql:dbname=downup;host=localhost";
$user = "root";
$pass = "";

try {
    $dbh = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo "Koneksi ke database gagal: ".$e->getMessage();
}

function formatBytes($bytes, $precision = 2 ) {
	$unit = array( 'B', 'KB', 'MB', 'GB', 'TB' );
	
	$bytes = max($bytes, 0);
	$pow = floor(($bytes ? log($bytes) : 0) / log(1024));
	$pow = min ($pow, count($unit) - 1);
	
	$bytes /= pow(1024, $pow);
	
	return round($bytes, $precision) . '' . $unit[$pow];
}
?>