<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>Input Data Surat</title>
<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>


<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
       	</script>
</head>
<?php
$ukm=$_SESSION['ukm'];
?>
<body>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>INPUT DATA SURAT</center>
		</td>
	</tr>
	<tr>
		<td>Kegiatan</td>
		<td>:</td>
		<td>
        <select name='kegiatan'>
        <option value='other'>---Pilih---</option>
			<?php 
		$sql=mysql_query("SELECT * from kegiatan where kd_ukm='$ukm' and status=''");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id]'>$data[nama_kegiatan]</option>";
}
echo "</select>";
		?>
		</td>
	</tr>
	<tr>
		<td>Jenis Surat</td>
		<td>:</td>
		<td>
        <select name='surat'>
        	<option value=''>---pilih---</option>
			<option value='surat masuk'>Surat Masuk</option>
            <option value='surat keluar'>Surat Keluar</option>
		</td>
	</tr>
    <tr>
		<td>Judul Surat</td>
		<td>:</td>
		<td>
			<input name='judul' type='text' size='30'>
		</td>
	</tr>
    <tr>
		<td>No Surat</td>
		<td>:</td>
		<td>
			<input name='no_surat' type='text' size='30'>
		</td>
	</tr>
	<tr>
            <td>Tanggal Surat</td>
            <td>:</td>
            <td><input name="tgl_surat" type="text" size="30" id="tanggal"</td>
          </tr>
    <tr>
		<td>Upload Surat</td>
		<td>:</td>
		<td>
			<input name='file' type='file'/> File type .docx Max file 2MB
		</td>
	</tr>
    
	<tr>
		<td colspan='2'></td>
		<td>
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Kembali' onclick=\"window.location.href='?module=data_surat';\">";?>
		</td>
	</tr>
</table>
</form>
<?php

if(isset($_POST['save']))
{
	$kd=$_SESSION['ukm'];
	$kegiatan=$_POST['kegiatan'];
	$surat=$_POST['surat'];
	$judul=$_POST['judul'];
	$no_surat=$_POST['no_surat'];
	$tanggal= $_POST['tgl_surat'];	
	if ((empty($kegiatan)) or (empty($surat)) or (empty($no_surat)) or (empty($tanggal)) or (empty($judul)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
}else{	
	$file =$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];
$file_size	=$_FILES['file']['size'];
if (!$file){
		echo "File file belum ada<br>";
		echo "<a href='?module=input_surat'>Kembali</a>";
		exit;
	}
	else{
		if ($file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			$nama_file_baru	=$judul."_".$tanggal."_".$kd.".docx";
		}
		else{
		//echo "file=$file<br>";
	//echo "file_type=$file_type<br>";
			echo "Format file tdk mendukung<br>";
			echo "<a href='?module=input_surat'>Kembali</a>";
			exit;
		}
	}
	$maxsize=2000000;
	if ($file_size>$maxsize){
		echo "Ukuran file Terlalu Besar<br>";
			echo "<a href='?module=input_surat'>Kembali</a>";
			exit;
	}else{
	//$nama_file_baru	="img".$nim.".jpg";
	$tujuan			="surat/".$nama_file_baru;
	copy($file,$tujuan);
/*	$cekdata="select kd_dosen from dosen where kd_dosen='$kd_dosen'";

	$ada=mysql_query($cekdata) or die(mysql_error());

	if(mysql_num_rows($ada)>0)

	{ die?><script language="javascript">alert("KODE DOSEN TELAH TERDAFTAR!!!")</script><? }

*/
//disini berisi perintah penyimpanan atau prosedur simpan kedalam database
		mysql_query("insert into surat(id_surat,kd_ukm,id,judul_surat,jns_surat,no_surat,link,tgl_surat) values(null,'$ukm','$kegiatan','$judul','$surat','$no_surat','$nama_file_baru','$tanggal')");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');</script>";	
	}
}
}
?>
</body>
</html>
