<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Akun</title>
</head>

<body>
<h1><center>Buat Akun UKM</center></h1>
<form method="post" action="" enctype="multipart/form-data">
<table>
<tr>
	<td>Nama UKM</td>
    <td>:</td>
    <td><select name="ukm">
    <?php
	$a=mysql_query("select * from ukm");
	while ($b=mysql_fetch_array($a)){
	echo"<option value='$b[kd_ukm]'>$b[nama_ukm]</option>";	
	}
	?>
    </select>
   </td>
</tr>
<tr>
	<td>Username</td>
    <td>:</td>
    <td><input name="username" type="text" size="20"/>
   </td>
</tr>
<tr>
	<td>Password</td>
    <td>:</td>
    <td><input name="password" type="text" size="20"/>
   </td>
</tr>
<tr>
	<td colspan="2"><input name="simpan" type="submit" value="Simpan" />
    <input type='reset' name='reset' value='Batal'>
            </td>
</tr>    
</table>
</form>
<?php
if (isset($_POST['simpan'])){
$ukm=$_POST['ukm'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$level=2;
$sql=mysql_query("select * from akun where username='$username' or kd_ukm='$ukm'");
$ada=mysql_fetch_array($sql);
if($ada['kd_ukm']==$ukm){echo"<script language='javascript'>alert('UKM Sudah Terdaftar!!!');</script>";}
elseif($ada['username']==$username){echo"<script language='javascript'>alert('Username Sudah Terdaftar!!!');</script>";}else{
	mysql_query("insert into akun(kd_ukm,username,password,level)values('$ukm','$username','$password','$level')");
	mysql_query("insert into kegiatan(kd_ukm,nama_kegiatan,photo)values('$ukm','harian','no_image.jpg')");
	
	?><script language="javascript">alert("DATA TERSIMPAN!!!");</script><?php
}
}
?>
  
</body>
</html>