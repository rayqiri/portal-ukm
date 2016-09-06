<html>
<head>
	<title>PORTAL UNIT KEGIATAN MAHASISWA</title>
	<link href="css/login.css" rel="stylesheet" type="text/css">
</head>

<body background="">
<div id="login-box">
	<center><h1><font face="Rockwell Extra Bold" size="+6" color="#000000">Login</font></h1></center>
	<center><h3><font color="#000000">SIM UKM</font></h3></center>
	<form method="POST" action="cek_login.php">
    <div id="login-box-name" style="margin-top:20px;color:#000;">Username:</div>
	<div id="login-box-field" style="margin-top:20px;"><input name="username" type="text" class="form-login" title="Username" size="30" maxlength="50"></div>
	<div id="login-box-name" style="color:#000;">Password:</div>
	<div id="login-box-field"><input name="password" type="password" class="form-login" title="Password" size="30" maxlength="50"></div>
    <div id="login-box-name" style="color:#000;">Level:</div>
	<div id="login-box-field">
		<select name="level" class="form-login">
			<option value='0' selected>++ Pilih Level ++</option>
			<option value='1'>Administrator</option>
			<option value='2'>UKM</option>
		</select>
   <br><br>
   <div id="login-box-name"></div>
   <div id="login-box-field">
		<input type="submit" value="Login"><input type="Reset" value="Cancel"><br><br>
	</div>
    
	</form>
    <div align="center">
	  <p>Copyright &copy; 2015 <a href="https//www.facebook.com/agung.rifqi.hidayat">Agung Rifqi Hidayat</a>, <u><a href="mailto:rayqiri@gmail.com">rayqiri@gmail.com</a></u> </p>
	  <p>| Version <b>1.0</b></p>
	</div>
</div>

</body>
</html>