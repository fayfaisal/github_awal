
<head> 
<title>  Upload dan Download File </title>
<link rel = "stylesheet" type = "text/css"  href = "style.css">
</head>


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
			</tr>
			<?php
				    $sql = "SELECT * FROM tabel_biodata ORDER BY id";
    $no  = 1;
    foreach ($dbh->query($sql) as $data) :
    ?>
						
								<tr bgcolor = "#fff">
								<td align = "center"> <?php $no ?> </td>
								<td align = "center"> <?php $data['tanggal_upload'] ?> </td>
								<td align = "center"> <a href = $data['file']> <?php $data['nama_file'] ?> </a> </td>
								<td align = "center"> <?php $data['tipe_file'] ?> </td>
								<td align = "center"> <?php formatBytes($data['ukuran_file']) ?></td>
								<td align = "center"> <a href = "hapus.php" <?php echo $data['nama_file'] ?> onclick="return confirm("Anda yakin akan menghapus data?")"> <img alt="hapus" src="icon/hapus.png" /></a> </a> </td>
								</tr>
							
							<?php $no++; ?>
		</table>	
		</p>
	</div>
	</div>