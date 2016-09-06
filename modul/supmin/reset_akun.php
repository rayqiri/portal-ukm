<?php


$id=$_GET['id'];
$pass=md5($_GET['pas']); 
mysql_query("update akun set password='$pass' where id_akun='$id'");
?><script language="javascript">alert("PASSWORD BERHASI DIRESET. USERNAME=PASSWORD!!!");window.location ='../master.php?module=manajemen_user'</script><?php

?>