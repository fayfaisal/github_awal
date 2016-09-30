<!DOCTYPE html>
<html>
<head> 
<title>  Upload dan Download File </title>
<link rel = "stylesheet" type = "text/css"  href = "style.css">
</head>
<body> 

	<div id = "container">
	<div id = "header">
		<h1> Upload dan Download File </h1>
		<span> Dibuat oleh faisal faisalikevil@gmail.com </span>
	</div>
	
	<div id = "menu">
		<a href = "index.php"> Home </a>
		<a href = "upload.php"> Upload </a>
		<a href = "download.php" class = "active"> Download </a>
	</div>
	
	<div id = "content">
		<h2> Download </h2>
		<p> Silahkan Download file yang sudah anda upload. Untuk menDownload, anda bisa mengklik judul file yang diinginkan </p>
		
		<p>
		<table class = "table" width = "100%" cellpadding = "3" cellspacing = "0">
			<tr>
				<th width = "30">No.</th>
				<th width = "80">Tanggal Upload</th>
				<th>Nama File</th>
				<th width = "70">Tipe</th>
				<th width = "70">Ukuran</th>
				<th width = "70">Pilihan</th>
			</tr>
			<?php
			include 'config.php';
    $sql = "SELECT * FROM download ORDER BY id desc";
    $no  = 1;
    foreach ($dbh->query($sql) as $data) :
    ?>
        <tr>
            <td align="center"><?php echo $no++; ?></td>
            <td align="center"><?php echo $data['tanggal_upload'] ?></td>
            <td align="center"> <a href = "$data['file']"> <?php echo $data['nama_file'];?> </a> </td>
            <td align="center"><?php echo $data['tipe_file'] ?></td>
            <td align="center"><?php echo formatBytes($data['ukuran_file']) ?></td>
            <td align="center">
                <a href = "hapus.php?id = <?php echo $data['id'] ?>" onclick="return confirm('Anda yakin akan menghapus data?')"><img alt="hapus" src="icon/hapus.png" /></a>
            </td>
        </tr>

    <?php
    endforeach;
    ?>
			
		</table>	
		</p>
	</div>
	</div>
</body>
</html>