<?
mysql_query("DELETE FROM akun WHERE id_akun = '$_GET[id]'");

	echo"<script language='javascript'>window.location ='../master.php?module=manajemen_user'</script>";
	?>