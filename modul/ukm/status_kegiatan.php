<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Proses Kegiatan</title>
</head>

<body>
<form method='POST' action=''>
<h2><center>DAFTAR KEGIATAN HMJ TI UMK</center></h2>
<table>
<tr>
	<th><b>Pilih</th>
	<th><b>Nama Kegiatan</th>
    <th><b>Ketua Panitia</th>
    <th><b>Tempat</th>
	<th><b>Tanggal Mulai</th>
    <th><b>Tanggal Selesai</th>
</tr>
<?php
$ukm=$_SESSION['ukm'];
$sql=mysql_query("select * from kegiatan,kepanitiaan where kegiatan.id=kepanitiaan.id and kegiatan.kd_ukm='$ukm' and kegiatan.status=''");
while($data=mysql_fetch_array($sql))
{
	/*if ($data['status']==''){
		$cek="";
		$bg="#FFFFFF";
	}else{
		$cek="disabled";
		$bg="#333333";
	}*/
	echo"
<tr>
	<td align='center' bgcolor='$bg'><input name='item[]' type='checkbox' id='item[]' value='$data[id]'></td>
	<td>$data[nama_kegiatan]</td>
    <td>$data[ketua]</td>
    <td>$data[tempat]</td>
	<td>$data[tanggal_mulai]</td>
	<td>$data[tanggal_selesai]</td>
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
for($i=0; $i < $jumlah; $i++)
{
    $id=$_POST['item'][$i];

	mysql_query("update kegiatan set status='TERLAKSANA' where id='$id'");
}
echo"<script>alert('DATA TERSIMPAN');window.location ='../master.php?module=data_kegiatan'</script>";
}
?>
</body>
</html>