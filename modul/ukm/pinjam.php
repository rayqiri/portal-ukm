<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PINJAM BARANG INVENTARIS</title>
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

<body>
<?php
$ukm=$_SESSION['ukm'];
?>
<form method='POST' action=''>
<h1><center>PINJAM BARANG INVENTARIS</center></h1>
<table>
<tr>
		<td>NIM</td>
		<td>:</td>
		<td>
			<input name='nim' type='text' size='30' id='cari'>
		</td>
	</tr>
    <tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input name='nama' type='text' size='30' id='cari'>
		</td>
	</tr>
  <tr>
		<td>Progdi</td>
		<td>:</td>
		<td>
		<select name='progdi'>
				<option>---Pilih Progdi---</option>
                <?php
				$sql=mysql_query("select * from progdi");
				while($data=mysql_fetch_array($sql)){
					echo"
				<option value='$data[nm_progdi]'>$data[nm_progdi]</option>";}?>
			</select>
		</td>
	</tr>	
	<tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td>
        <select name='nama_brg'>
			<?php 
		$sql=mysql_query("SELECT kd_inventaris,nama_barang from inventaris where kd_ukm='$ukm'");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[kd_inventaris]'>$data[nama_barang]</option>";
}
echo "</select>";
		?>
		</td>
	</tr>
    <tr>
		<td>Jumlah</td>
		<td>:</td>
		<td>
			<input name='jumlah' type='text' size='30' id='cari'>
		</td>
	</tr>
    <tr>
		<td>Keterangan</td>
		<td>:</td>
		<td>
			<input name='ket' type='text' size='30' id='cari'>
		</td>
	</tr>
   <tr>
            <td>Tanggal Pinjam</td>
            <td>:</td>
            <td><input type="text"  name="tgl_pinjam" id="tanggal"/></td>
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
    </form>
<?php
session_start();
if($_POST['simpan'])
{
	$nim=$_POST['nim'];
	$prodi=$_POST['prodi'];
	$nama=$_POST['nama'];
	$brg=$_POST['nama_brg'];
	$ket=$_POST['ket'];
	$jumlah=$_POST['jumlah'];
	$tanggal= $_POST['tgl_pinjam'];
	$a=mysql_query("select jumlah_barang from inventaris where kd_inventaris='$brg'");
	$b=mysql_fetch_array($a);
	$jml_brg=$b['jumlah_barang']-$jumlah;
	$status="pinjam";
if ((empty($nim)) or (empty($nama)) or (empty($jumlah)) or (empty($brg)) or (empty($ket))){
?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?	
}
	else{
		mysql_query("insert into pinjam(id_pinjam,kd_inventaris,nim,nama,prodi,jml_pinjam,tgl_pinjam) values(null,'$brg','$nim','$nama','$prodi','$jumlah','$tanggal')");
		mysql_query("update inventaris set status='$status',jumlah_barang='$jml_brg' where kd_inventaris='$brg'");
		?>
	<script>
		alert('Data Tersimpan');window.location ="../ukm/master.php?module=data_pinjam"
	</script>
<?php
}
}
?>  
</body>
</html>