<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Admin</title>
<script>    
	$(function(){
    $('#fak')
    .change(function(){
    var kode = $(this).val();
	$('#alpha').slideUp('normal');
    $('#alpha').slideDown('normal').load('modul/supmin/ajax_fakultas.php',{ kode: kode});
    })
    .change();
    });
    </script>
</head>

<body>
<h1><center>Buat Akun Admin</center></h1>
<form method="post" action="" enctype="multipart/form-data">
<table>
<tr>
	<td>Nama</td>
    <td>:</td>
    <td><input name="nama" type="text" size="40" />
   </td>
</tr>
<tr>
	<td>Jabatan</td>
    <td>:</td>
    <td><select name="jabatan" id='fak'>
    <option value='1'>Wakil Rektor</option>
    <option value='2'>Wakil Dekan</option>
    </select>
    <p id="alpha">
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
	<td colspan="3" align="center"><input name="simpan" type="submit" value="Simpan" />
    <input type='reset' name='reset' value='Batal'>
			
            </td>
</tr>    
</table>
</form>
<?php
if (isset($_POST['simpan'])){
$nama=$_POST['nama'];
$jabatan=$_POST['jabatan'];
$fakultas=$_POST['fakultas'];
$username=$_POST['username'];
$password=md5($_POST['password']);
if ((empty($nama)) or (empty($jabatan)) or (empty($username)) or (empty($password)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
}else{ 
	mysql_query("insert into admin(nama_admin,jabatan,fakultas)values('$nama','$jabatan','$fakultas')");
	$a=mysql_query("select username from akun where username='$username'");
	$b=mysql_fetch_array($a);
	if($b>0){echo"<script language='javascript'>alert('Username Sudah Terdaftar!!!');</script>";}else{
	$sql=mysql_query("select kd_admin from admin where nama_admin='$nama'");
	$ada=mysql_fetch_array($sql);
	$kd=$ada['kd_admin'];
	mysql_query("insert into akun(kd_admin,fakultas,username,password,level)values('$kd','$fakultas','$username','$password','1')");
	
	?><script language="javascript">alert("DATA TERSIMPAN!!!")</script><?php
}
}
}
?>
  
</body>
</html>