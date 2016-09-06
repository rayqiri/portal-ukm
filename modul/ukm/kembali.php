<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proses Pengembalian</title>
</head>

<body>
<form method='POST' action=''>
<h2><center>DAFTAR BARANG INVENTARIS YANG DIPINJAM</center></h2>
<table>
<tr>
	<th><b>Pilih</th>
	<th><b>NIM</th>
	<th><b>Nama</th>
    <th><b>Prodi</th>
    <th><b>Nama Barang</th>
    <th><b>Jumlah</th>
	<th><b>Tanggal Pinjam</th>
</tr>
<?php
$ukm=$_SESSION['ukm'];
$sql=mysql_query("select * from pinjam,inventaris where inventaris.kd_inventaris=pinjam.kd_inventaris and inventaris.kd_ukm='$ukm' and inventaris.status='pinjam'");
while($data=mysql_fetch_array($sql))
{
	echo"
<tr>
	<td align='center'><input name='item[]' type='checkbox' id='item[]' value='$data[kd_inventaris]' $cek></td>
	<td>$data[nim]</td>
	<td>$data[nama]</td>
    <td>$data[prodi]</td>
    <td>$data[nama_barang]</td>
    <td>$data[jml_pinjam]</td>
	<td>$data[tgl_pinjam]</td>
	<input type='hidden' name='jml' value='$data[jml_pinjam]'>
</tr>
	";
}
?>
<tr>
<td><input name='proses' type='submit' value='PROSES'></td>
<td><input name='reset' type='reset' value='BATAL'></td>
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
	$jml_brg=$_POST['jml'];
	$a=mysql_query("select jumlah_barang from inventaris where kd_inventaris='$id'");
	$b=mysql_fetch_array($a);
	$jml=$b['jumlah_barang']+$jml_brg;
	mysql_query("update inventaris set update_tgl='$date',status='kembali',jumlah_barang='$jml' where kd_inventaris='$id'");
}
echo"<script>alert('DATA TERSIMPAN');window.location ='../ukm/master.php?module=data_pinjam'</script>";
}
?>
</body>
</html>