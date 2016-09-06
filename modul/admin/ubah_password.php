<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reset Password</title>
</head>

<body>

<form method='POST' action=''>
<table>
<tr>
		<th>Masukkan Username :</th>
		<td colspan='3'>
        <input name='nim' type='text' size='20' />
		
        
        <input name='submit' type='submit' value='CARI' />
		</td>
</tr>
</table>
</form>
<h2><center>TABEL MAHASISWA</center></h2>
<table>
<tr>
	<th><b>NIM</th>
	<th><b>Nama</th>
    <th><b>Username</th>
    <th><b>Reset</th>
</tr>

<?php
if($_POST[submit]){
$sql=mysql_query("select * from tuser where Username='$_POST[nim]'");
$data=mysql_fetch_array($sql);
echo"
<form method='post' action''>
<tr>
	<td>$data[Username]</td>
	<td>$data[NamaLengkap]</td>
    <td>$data[Username]</td>
	<td><input name='ubah' type='submit' value='RESET'></td>
    <input name='id' type='hidden' value='$data[IdUser]'/>
	<input name='pass' type='hidden' value='$data[Username]'/>
</tr>
";
}
echo"
</form>
</table>
	";
  ?>
<?php

if ($_POST[ubah]){
$id=$_POST[id];
$pass=md5($_POST[pass]);
$date=date('Y-m-d H:i:s'); 
mysql_query("update tuser set Password='$pass',LastUpdateDate='$date' where IdUser='$id'");
echo"<script>alert('Password Berhasil Dirubah')</script>";		
}
?>
</body>
</html>