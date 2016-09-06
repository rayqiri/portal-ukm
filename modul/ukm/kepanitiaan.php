<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kepanitiaan</title>
<link rel="stylesheet"
    href="js/jquery-ui.css" />
    <script src="js/jquery-1.8.3.js"></script>
    <script src="js/jquery-ui.js"></script>
        <script>
    $(function() {  
        $( "#nama" ).autocomplete({ 
		source: "?module=ajaxpanitia",
           minLength:2, 
        });
    });
    </script>

</head>

<body>
<?php
	$ukm=$_SESSION['ukm'];
	?>
        <form method='POST' action=''>
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>KEPANITIAAN</center>
		</td>
	</tr>
	<tr>
		<td>Kegiatan</td>
		<td>:</td>
		<td>
        <select name='kegiatan'>
        <option value="">---pilih---</option>
			<?php 
		$sql=mysql_query("SELECT * from kegiatan where kd_ukm='$ukm' and status=''");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id]'>$data[nama_kegiatan]</option>";
}?>
</select>
		
		</td>
	</tr>
    <tr>
		<td>Ketua</td>
		<td>:</td>
		<td>
			<select name='ketua'>
            <option value="">---pilih---</option>
			<?php 
		$sql2=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data2 = mysql_fetch_array($sql2)){
	echo "<option value='$data2[nama]'>$data2[nama]</option>";
}?>
</select>
		</td>
	</tr>
    <tr>
		<td>Sekretaris</td>
		<td>:</td>
		<td>
		<select name='sekretaris'>
        <option value="">---pilih---</option>
			<?php 
		$sql3=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data3 = mysql_fetch_array($sql3)){
	echo "<option value='$data3[nama]'>$data3[nama]</option>";
}?>
</select>
		</td>
	</tr>
    <tr>
		<td>Bendahara</td>
		<td>:</td>
		<td>
			<select name='bendahara'>
            <option value="">---pilih---</option>
			<?php 
		$sql4=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data4 = mysql_fetch_array($sql4)){
	echo "<option value='$data4[nama]'>$data4[nama]</option>";
}?>
</select>
		</td>
	</tr>
    <tr>
		<td>Koordinator Perlengkapan</td>
		<td>:</td>
		<td>
			<select name='koor1'>
            <option value="">---pilih---</option>
			<?php 
		$sql5=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data5 = mysql_fetch_array($sql5)){
	echo "<option value='$data5[nama]'>$data5[nama]</option>";
}?>
</select>
		</td>
	</tr>
     <tr>
		<td>Koordinator Konsumsi</td>
		<td>:</td>
		<td>
			<select name='koor2'>
            <option value="">---pilih---</option>
			<?php 
		$sql6=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data6 = mysql_fetch_array($sql6)){
	echo "<option value='$data6[nama]'>$data6[nama]</option>";
}?>
</select>
		</td>
	</tr>
     <tr>
		<td>Koordinator Dokumentasi</td>
		<td>:</td>
		<td>
			<select name='koor3'>
            <option value="">---pilih---</option>
			<?php 
		$sql7=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data7 = mysql_fetch_array($sql7)){
	echo "<option value='$data7[nama]'>$data7[nama]</option>";
}?>
</select>
		</td>
	</tr>
     <tr>
		<td>Koordinator Keamanan</td>
		<td>:</td>
		<td>
			<select name='koor4'>
            <option value="">---pilih---</option>
			<?php 
		$sql8=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data8 = mysql_fetch_array($sql8)){
	echo "<option value='$data8[nama]'>$data8[nama]</option>";
}?>
</select>
		</td>
	</tr>
    <tr>
		<td>Koordinator Publikasi</td>
		<td>:</td>
		<td>
			<select name='koor5'>
            <option value="">---pilih---</option>
			<?php 
		$sql9=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data9 = mysql_fetch_array($sql9)){
	echo "<option value='$data9[nama]'>$data9[nama]</option>";
}?>
</select>
		</td>
	</tr>
    <tr>
		<td>Koordinator Sponsor</td>
		<td>:</td>
		<td>
			<select name='koor6'>
            <option value="">---pilih---</option>
			<?php 
		$sql9=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data9 = mysql_fetch_array($sql9)){
	echo "<option value='$data9[nama]'>$data9[nama]</option>";
}?>
</select>
		</td>
	</tr>
    <tr>
		<td>Koordinator Humas</td>
		<td>:</td>
		<td>
			<select name='koor7'>
            <option value="">---pilih---</option>
			<?php 
		$sql9=mysql_query("SELECT * from anggota,mahasiswa where anggota.nim=mahasiswa.nim and anggota.kd_ukm='$ukm'");
		while ($data9 = mysql_fetch_array($sql9)){
	echo "<option value='$data9[nama]'>$data9[nama]</option>";
}?>
</select>
		</td>
	</tr>
    <tr>
		<td colspan='2'></td>
		<td>
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Kembali' onclick=\"window.location.href='?module=data_';\">";?>
		</td>
	</tr>
</table>
</form>
    </body>
</html>
<?php

if(isset($_POST['save']))
{
	$kegiatan=$_POST['kegiatan'];
	$ketua=$_POST['ketua'];
	$sekretaris=$_POST['sekretaris'];
	$bendahara= $_POST['bendahara'];
	$koor1= $_POST['koor1'];
	$koor2= $_POST['koor2'];
	$koor3= $_POST['koor3'];
	$koor4= $_POST['koor4'];
	$koor5= $_POST['koor5'];
	$koor6= $_POST['koor6'];
	$koor7= $_POST['koor7'];
	if ((empty($ketua)) or (empty($kegiatan)) or (empty($sekretaris)) or (empty($bendahara)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
}else{ 
mysql_query("insert into kepanitiaan (id,ketua,sekretaris,bendahara,koordinator1,koordinator2,koordinator3,koordinator4,koordinator5,koordinator6,koordinator7)values('$kegiatan','$ketua','$sekretaris','$bendahara','$koor1','$koor2','$koor3','$koor4','$koor5','$koor6','$koor7')");
echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');</script>";	
}
}
?>