<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TAMPIL MAHASISWA</title>

</head>

<body>
<?php
session_start();
$nim=$_SESSION['Username'];
?>
<h2><center>PROFIL PENGURUS</center></h2>
<table border='1'>        
<?php

$sql=mysql_query("select * from mahasiswa where nim='$nim'");
while($ada=mysql_fetch_array($sql))
{
echo"
<div id='groupmodul'>
		<tr><td roowspan='12' valign='top' colspan='2'><img alt='galeri' src='$ada[photo]' height='200'></td></tr>
		<tr><td class=cc>Nim</td>         <td class=cb>$ada[nim]</td></tr>
        <tr><td class=cc>Nama</td>        <td class=cb>$ada[nama]</td></tr>
        <tr><td class=cc>Alamat</td>      <td class=cb>$ada[alamat]</td></tr>
        <tr><td class=cc>Telephon</td>    <td class=cb>$ada[telp]</td></tr>
        <tr><td class=cc>Agama</td>       <td class=cb>$ada[agama]</td></tr>
        <tr><td class=cc>E-Mail</td>      <td class=cb>$ada[email]</td></tr>
        <tr><td class=cc>Tempat Lahir</td>        <td class=cb>$ada[tempat_lahir]</td></tr>
        <tr><td class=cc>Tanggal Lahir</td>      <td class=cb>$ada[tanggal_lahir]</td></tr>
        <tr><td class=cc>Jenis Kelamin</td>    <td class=cb>$ada[jns_kelamin]</td></tr>
        <tr><td class=cc>Angkatan</td>       <td class=cb>$ada[angkatan]</td></tr>
";
}
?>
</div>
</table>



<br>
<br>
</body>
</html>
