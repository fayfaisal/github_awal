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
		<a href = "upload.php" class = "active"> Upload </a>
		<a href = "download.php"> Download </a>
	</div>
	
	<div id = "content">
		<h2 align="center"> Upload </h2>
		<p align="center"> Upload file anda dengan melengkapi form dibawah ini </p>
		
		<?php
			include ('config.php');
			if(isset($_POST['upload']) && $_POST['upload']) {
				$allowed_ext = array ( 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx', 'pdf', 'rar', 'zip', 'jpeg', 'jpg', 'JPG' );
				$file_name = $_FILES['file']['name'];
				$file_ext = strtolower(end(explode('.', $file_name)));
				$file_size = $_FILES['file']['size'];
				$file_tmp = $_FILES['file']['tmp_name'];
				
				$nama = $_POST['nama'];
				$tgl = date("Y-m-d");
				
				if(in_array($file_ext, $allowed_ext) === true ) {
					if($file_size < 1044070) {
						$lokasi = 'file/'.$nama.'.'.$file_ext;
						move_uploaded_file($file_tmp, $lokasi);
						$sql = mysql_query("INSERT INTO download VALUES(NULL, '$tgl', '$nama', '$file_ext', '$file_size', '$lokasi')");
						if($sql){
							echo '<div align = "center"> SUCCESS : File berhasil di Upload! </div>';
						}else{
							echo '<div> FAILED : File gagal di Upload! </div>';
						}
					}else{
						'<div> FAILED : Besar ukuran file terlalu besar </div>';
				}
			}else{
				'<div> FAILED : Extention file tidak di izinkan </div>';
			}
		}
		?>
		
		<p> 
			<form action = "" method = "post" enctype = "multipart/form-data">
			<table widht = "100%" align = "center" boder = "0" bgcolor "#eee" cellpadding = "2" cellspacing = "0">
		<tr>
			<td widht "40%" align = "right"><b>Nama File</b> </td> <td><input type = "text" name = "nama" size = "40" required/></td>
		</tr>
		<tr>
			<td widht "40%" align = "right"><b>Pilih File</b> </td> <td><input type = "file" name = "file" required/></td>
		</tr>
		<tr>
			<td> &nbsp; </td> <td> <input type = "submit" name = "upload" value = "upload"/> </td>
		</tr>
		</table>
		</form>
		</p>
	</div>
	</div>
</body>
</html>