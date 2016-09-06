<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>apbu</title>
</head>

<body>
<form method='POST' action=''>
<h2><center>DAFTAR PENGAJUAN APBU</center></h2>
<table>
<tr>
	<th><b>Pilih</th>
	<th><b>UKM</th>
	<th><b>Jumlah</th>
    <th><b>Tanggal</th>
    <th><b>Status</th>
    <th><b>File Proposal</th>
</tr>
<?php
$fak=$_SESSION['fakultas'];
$sql=mysql_query("select * from apbu,ukm where apbu.kd_ukm=ukm.kd_ukm and ukm.fakultas='$fak' and apbu.keterangan !='Sudah Diambil'");
while($data=mysql_fetch_array($sql))
{
	echo"
<tr>
	<td align='center'><input name='item[]' type='checkbox' id='item[]' value='$data[id_apbu]' $cek></td>
	<td>$data[nama_ukm]</td>
	<td>$data[jumlah]</td>
    <td>$data[thn_pengambilan]</td>
	<td>$data[keterangan]</td>
    <td><a href='$data[file]'>Download</a></td>
</tr>
	";
}
?>
<tr>
<td><input name='proses' type='submit' value='Disetujui'></td>
<td><input name='ambil' type='submit' value='Diambil'></td>
</tr>
</table>
</form>
<?php
if (isset($_POST['proses'])) {
$jumlah = count($_POST['item']);
$date=date('Y-m-d');

for($i=0; $i < $jumlah; $i++)
{
    $id=$_POST['item'][$i];
	mysql_query("update apbu set keterangan='Disetujui' where id_apbu='$id'");
}
echo"<script>alert('DATA TERSIMPAN');window.location ='../ukm/master.php?module=data_apbu'</script>";
}
if (isset($_POST['ambil'])){
	$jumlah = count($_POST['item']);
$date=date('Y-m-d');

for($i=0; $i < $jumlah; $i++)
{
    $id=$_POST['item'][$i];
	mysql_query("update apbu set keterangan='Sudah Diambil' where id_apbu='$id'");
}
echo"<script>alert('DATA TERSIMPAN');window.location ='../ukm/master.php?module=data_apbu'</script>";
}
?>
</body>
</html>