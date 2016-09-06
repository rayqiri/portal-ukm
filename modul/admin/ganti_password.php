<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ganti Password</title>
</head>

<body>
<h2><center>Ganti Password</center></h2>
<table>

<form action="" method="POST" />

<tr><td>Password Lama :</td><td><input type='password' name='passwordlama' id='passwordlama' autofocus/></td></tr>

<tr><td>Password Baru :</td><td><input type='password' name='passwordbaru' id='passwordbaru' /></td></tr>

<tr><td>Konfirmasi Password Baru :</td><td><input type='password' name='konfirmasipassword' id='konfirmasipassword' /></td></tr>

<tr><td></td><td><input type='submit' name='change' value='GANTI' /></td></tr>

</form>

</table>
<?php

if (isset($_POST['change'])){
$passwordlama =md5($_POST['passwordlama']);

$passwordbaru =($_POST['passwordbaru']);
$pass=md5($passwordbaru);

$konfirmasipassword =md5($_POST['konfirmasipassword']);

$cekuser ="select * from akun where username ='$_SESSION[username]' and password='$passwordlama'";

$querycekuser = mysql_query($cekuser);

$count =mysql_num_rows($querycekuser);

if ($count >= 1){

$updatepassword = "update akun set password ='$pass' where username ='$_SESSION[username]'";

$updatequery = mysql_query($updatepassword);

}else{ ?> <script language='javascript'>alert("Password Anda Salah, Ulangi Proses Masukkan Password Lama Anda")</script> 

<?php }

if($updatequery)

{

echo"<script language='javascript'>alert('Password telah diganti menjadi $passwordbaru')</script>";

}

}

?>
</body>
</html>