<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dokumentasi</title>
</head>

<body>
<?php
$ukm=$_SESSION['ukm'];
?>
 <form method='POST' action='' enctype="multipart/form-data">
 <table>
	<tr>
		<td height='50' colspan='3'>
			<center>DOKUMENTASI KEGIATAN</center>
		</td>
	</tr>
	<tr>
		<td>Kegiatan</td>
		<td>:</td>
		<td>
        <select name='kegiatan'>
			<?php 
		$sql=mysql_query("SELECT * from kegiatan where kd_ukm='$ukm'");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id]'>$data[nama_kegiatan]</option>";
}
echo "</select>";
		?>
		</td>
	</tr>
 <tr>
		<td>Upload File Dokumentasi</td>
		<td>:</td>
		<td>
			<input name='file' type='file'>file gambar Max size 1MB
		</td>
	</tr>
 <tr>
		<td>Keterangan</td>
		<td>:</td>
		<td>
			<input name='ket' type='text' size='30'>
		</td>
	</tr>
    <tr>
		<td colspan='2'></td>
		<td>
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			
		</td>
	</tr>
</table>
</form>
<?php
if(isset($_POST['save']))
{
	$kd=$_SESSION['ukm'];
	$kegiatan=$_POST['kegiatan'];
	$ket=$_POST['ket'];
	$tgl=$_POST['tgl'];
		if ((empty($kegiatan)) or (empty($ket)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
} 
$foto		=$_FILES['file']['tmp_name'];
$foto_type	=$_FILES['file']['type'];
$foto_size	=$_FILES['file']['size'];

	if (!$foto){
		echo "File foto belum ada<br>";
		echo "<a href='?module=dokumentasi'>Kembali</a>";
		exit;
	}
	else{
		if ($foto_type=="image/png"){
			$nama_foto_baru	="img".$ket."_".$kd.".png";
		}
		else if($foto_type=="image/jpeg"){
			$nama_foto_baru	="img".$ket."_".$kd.".jpg";
		}
		else{
			echo "Format foto tdk mendukung<br>";
			echo "<a href='?module=dokumentasi'>Kembali</a>";
			exit;
		}
	}
	$maxsize=1000000;
	if ($foto_size>$maxsize){
		echo "Ukuran foto Terlalu Besar<br>";
			echo "<a href='?module=dokumentasi'>Kembali</a>";
			exit;
	}else{
	$tujuan			="dokumentasi/".$nama_foto_baru;
	copy($foto,$tujuan);
	mysql_query("insert into dokumentasi(kd_ukm,id,dokumentasi,keterangan) values('$kd','$kegiatan','$nama_foto_baru','$ket')");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');</script>";	
}
}
?>
</body>
</html>
