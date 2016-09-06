<?php
include "koneksi/koneksi.php";
$username= $_POST['username'];
$password= md5($_POST['password']);
$level= $_POST['level'];

$sql 	= mysql_query("SELECT * FROM akun WHERE username = '$username' AND password = '$password' and level='$level'");
$ketemu = mysql_num_rows($sql);
$data	= mysql_fetch_array($sql);
if (empty($username) || empty($password)){
	echo "<script>alert('Anda belum memasukkan username atau password'); window.location = 'index.php'</script>";
}
else{
	if ($ketemu > 0){
		$date = date('Y-m-d H:i:s');
		mysql_query("UPDATE akun SET last_login = '$date' WHERE id_akun = '$data[id_akun]'");
		session_start();
		session_register(id_akun);
		session_register(username);
		session_register(password);
		session_register(kd_ukm);
		session_register(kd_admin);
		session_register(level);
		session_register(fakultas);
	
		$_SESSION['id'] 	= $data['id_akun'];
		$_SESSION['username'] = $data['username'];
		$_SESSION['password']	= $data['password'];
		$_SESSION['ukm']		= $data['kd_ukm'];
		$_SESSION['admin']		= $data['kd_admin'];
		$_SESSION['level']	= $data['level'];
		$_SESSION['fakultas']	= $data['fakultas'];
		header('location: master.php');
	}
	else{
		echo "<script>alert('username atau password salah'); window.location = 'index.php'</script>";
		header('location: index.php');
	}
}
?>