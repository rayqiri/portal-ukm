<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Ukm</title>
</head>

<body>
<h1><center>Input UKM</center></h1>
<form method="post" action="" enctype="multipart/form-data">
<table>
<tr>
	<td>Nama UKM</td>
    <td>:</td>
    <td><input name="nama" type="text" size="40" />
   </td>
</tr>
<tr>
	<td>Nama Singkatan UKM</td>
    <td>:</td>
    <td><input name="singkatan" type="text" size="20" />
   </td>
</tr>
<tr>
	<td>Fakultas</td>
    <td>:</td>
    <td><select name="fakultas">
    <option value='0'>TIdak Ada</option>
    <?php
	$a=mysql_query("select * from fakultas");
	while ($b=mysql_fetch_array($a)){
	echo"<option value='$b[kd_fakultas]'>$b[fakultas]</option>";	
	}
	?>
    </select>
    Untuk UKM Lingkup Universitas Pilih Tidak Ada
   </td>
</tr>
<tr>
	<td>Logo</td>
    <td>:</td>
    <td><input name="logo" type="file" />Max Size 2MB
   </td>
</tr> 
<tr>
	<td colspan="3" align="center"><input name="simpan" type="submit" value="Simpan" />
    <input type='reset' name='reset' value='Batal'>
            </td>
</tr>    
</table>
</form>
<?php
if (isset($_POST['simpan'])){
$nama=$_POST['nama'];
$singkatan=$_POST['singkatan'];
$fakultas=$_POST['fakultas'];
if ((empty($nama)) or (empty($singkatan)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
}else{
$logo		=$_FILES['logo']['tmp_name'];
$logo_type	=$_FILES['logo']['type'];
$file_size	=$_FILES['logo']['size'];
if (!$logo){
		echo "File Logo belum ada<br>";
		echo "<a href='?module=ukm'>Kembali</a>";
		exit;
	}
	else{
		if ($logo_type=="image/png"){
			$nama_logo_baru	=$singkatan.".png";
		}
		else if($logo_type=="image/jpeg"){
			$nama_logo_baru	=$singkatan.".jpg";
		}
		else{
			echo "Format logo tdk mendukung<br>";
			echo "<a href='?module=ukm'>Kembali</a>";
			exit;
		}
	}
	$maxsize=2000000;
	if ($file_size>$maxsize){
		echo "Ukuran logo Terlalu Besar<br>";
			echo "<a href='?module=ukm'>Kembali</a>";
			exit;
	}else{
	$tujuan			="ukm/".$nama_logo_baru;
	copy($logo,$tujuan);
	mysql_query("insert into ukm(nama_ukm,nama_full,fakultas,logo)values('$singkatan','$nama','$fakultas','$nama_logo_baru')");
	
	?><script language="javascript">alert("DATA TERSIMPAN!!!");</script><?php
}
}
}
?>
  
</body>
</html>