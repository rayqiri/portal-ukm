<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HASIL RAPAT</title>
</head>

<body>
<?php
$ukm=$_SESSION['ukm'];
?>
<form method='POST' action='' enctype="multipart/form-data">
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>INPUT DATA RAPAT HMJ TI UMK</center>
		</td>
	</tr>
	<tr>
		<td>Judul Rapat</td>
		<td>:</td>
		<td>
        <select name='rapat'>
			<?php 
		$sql=mysql_query("SELECT * from rapat where kd_ukm='$ukm' and hasil_rapat=''");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id_rapat]'>$data[judul]</option>";
}
echo "</select>";
		?>
		</td>
	</tr>
	<tr>
		<td>Hasil Rapat</td>
		<td>:</td>
		<td>
			<input name='file' type='file'>
		</td>
	</tr>
    <tr>
		<td colspan='2'></td>
		<td>
			<input name='simpan' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Back' onclick='javascript.history.back()'>";?>
		</td>
	</tr>
    </table>
<?php
if (isset($_POST['simpan'])){
$rapat=$_POST['rapat'];
$qr=mysql_query("select * from rapat where id_rapat='$rapat'");
$ada=mysql_fetch_array($qr);
$judul=$ada['judul'];
$tgl=$ada['tanggal_rapat'];
$kd=$_SESSION['ukm'];
$file =$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];
$file_size	=$_FILES['file']['size'];
if (!$file){
		echo "File belum ada<br>";
		echo "<a href='?module=hasil_rapat'>Kembali</a>";
		exit;
	}
	else{
		if ($file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			$nama_file_baru	=$judul."_".$tgl."_".$kd.".docx";
		}
		else if($file_type=="image/jpeg"){
			$nama_file_baru	=$judul."_".$tgl."_".$kd.".jpg";
		}
		else if($file_type=="image/png"){
			$nama_file_baru	=$judul."_".$tgl."_".$kd.".png";
		}
		else if($file_type=="application/pdf"){
			$nama_file_baru	=$judul."_".$tgl."_".$kd.".pdf";
		}
		else{
		//echo "file=$file<br>";
	//echo "file_type=$file_type<br>";
			echo "Format file tdk mendukung<br>";
			echo "<a href='?module=hasil_rapat'>Kembali</a>";
			exit;
		}
	}
	$maxsize=2000000;
	if ($file_size>$maxsize){
		echo "Ukuran file Terlalu Besar<br>";
			echo "<a href='?module=hasil_rapat'>Kembali</a>";
			exit;
	}else{
	
	//$nama_file_baru	="img".$nim.".jpg";
	$tujuan			="rapat/".$nama_file_baru;
	copy($file,$tujuan);
mysql_query("UPDATE rapat set hasil_rapat='$nama_file_baru' where id_rapat='$rapat'");
?>
	<script>
		alert('DATA TERSIMPAN');
	</script>
<?php	
}
}
?>
</body>
</html>

