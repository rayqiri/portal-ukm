<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DEBIT</title>
</head>

<body>
<?php
$ukm=$_SESSION['ukm'];
?>
<form method='POST' action=''>
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>INPUT DANA PEMASUKAN</center>
		</td>
	</tr>
	<tr>
		<td>Kegiatan</td>
		<td>:</td>
		<td>
        <select name='kegiatan'>
        <option value=''>---pilih---</option>
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
		<td>Dana Masuk</td>
		<td>:</td>
		<td>	
			<input name="masuk" type="text" size="20">
		</td>
	</tr>
    <tr>
		<td>Keterangan</td>
		<td>:</td>
		<td>	
			<input name="ket" type="text" size="20">
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
$kegiatan=$_POST['kegiatan'];
$masuk=$_POST['masuk'];
$ket=$_POST['ket'];
$date = date('Y-m-d H:i:s');
mysql_query("insert into bendahara(id_bendahara,id,kd_ukm,pemasukan,keterangan,date) values(null,'$kegiatan','$ukm','$masuk','$ket','$date')");
?>
	<script>
		alert('DATA TERSIMPAN');window.location ="../ukm/master.php?module=laporan_keuangan"
	</script>
<?php	
}
?>
</body>
</html>

