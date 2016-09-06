<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Inventaris</title>
</head>

<body>
<form method='POST' action=''>
<h1><center>INVENTARIS</center></h1>
<table>
    <tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td>
			<input name='nama' type='text' size='30'>
		</td>
	</tr>
    <tr>
		<td>Jumlah Barang</td>
		<td>:</td>
		<td>
			<input name='jumlah' type='text' size='30'>
		</td>
	</tr>
    <tr>
		<td>Kondisi</td>
		<td>:</td>
		<td>
			<input name='kondisi' type='text' size='30'>
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
    </form>
<?php
if(isset($_POST['simpan']))
{
	$ukm=$_SESSION['ukm'];
	$nama=$_POST['nama'];
	$jumlah=$_POST['jumlah'];
	$kondisi=$_POST['kondisi'];
	$date = date('Y-m-d H:i:s');
if ((empty($nama)) or (empty($jumlah)) or (empty($kondisi))){
?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?php	
}else{

		mysql_query("insert into inventaris(kd_inventaris,kd_ukm,nama_barang,jumlah_barang,kondisi,update_tgl) values(null,'$ukm','$nama','$jumlah','$kondisi','$date')");
		?>
	<script>
		alert('Data Tersimpan');window.location ="../ukm/master.php?module=data_inventaris"</script>
	</script>
<?php
}
}
?>
</body>
</html>