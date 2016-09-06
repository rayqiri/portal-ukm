
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PORTAL UNIT KEGIATAN MAHASISWA</title>
<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen" title="default" />
<!--  jquery core -->
<script src="js/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>

<!-- Custom jquery scripts -->
<script src="js/jquery/custom_jquery.js" type="text/javascript"></script>

<!-- MUST BE THE LAST SCRIPT IN <HEAD></HEAD></HEAD> png fix -->
<script src="js/jquery/jquery.pngFix.pack.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
	$(document).pngFix( );
	});
</script>
</head>
<body id="login-bg" onLoad="document.postform.elements['username'].focus();"> 
 
<!-- Start: login-holder -->
<div id="login-holder">

	<!-- start logo -->
	
	<!-- end logo -->
	
	<div class="clear"></div>
	
	<!--  start loginbox ................................................................................. -->
	<div id="loginbox">
	
	<!--  start login-inner -->
	<div id="login-inner">
	 <p align="center"><b><font face="verdana" size="2" color="#333333">PORTAL UNIT KEGIATAN MAHASISWA</font></b></p>
	 <br>
	 <p align="center"><b><font face="verdana" size="2" color="#333333">UNIVERSITAS MURIA KUDUS</font></b></p>
	 <br>
    	<p align="center"><font face="verdana" size="2" color="#333333"><?php  if(isset($_GET['status'])){ echo "&laquo;".$_GET['status']."&raquo;"; }?></font></p>
        
        <form action="cek_login.php" method="post" name="postform">
		<table border="0" cellpadding="0" cellspacing="0">
		<tr>
			<th>Username</th>
			<td><input type="text"  class="login-inp" name="username"/></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" value=""  name="password" onFocus="this.value=''" class="login-inp" /></td>
		</tr>
        <tr>
			<th>Level</th>
			<td><select name="level" class="login-inp" style="background-color:#333">
			<option value='0' selected>++ Pilih Level ++</option>
			<option value='1'>Wakil Rektor</option>
            <option value='1'>Wakil Dekan</option>
			<option value='2'>UKM</option>
		</select></td>
		</tr>
		<tr>
			<th></th>
			<td><input type="submit" name="login" value="LOGIN"/> <input type="reset" value="RESET"/></td>
		</tr>
		</table>
        </form>
	</div>
    
    
    
 	<!--  end login-inner -->
	<div class="clear"></div>
 </div>
 <!--  end loginbox -->

</div>
<!-- End: login-holder -->
</body>

</html>

