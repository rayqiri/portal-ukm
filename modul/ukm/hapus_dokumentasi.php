<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$sql=mysql_query("select * from dokumentasi where kd_dokumentasi='$_GET[id]'");
$ada=mysql_fetch_array($sql);
$hapus_file="dokumentasi/".$ada['dokumentasi'];
if($ada>0){
unlink($hapus_file);	
}
mysql_query("DELETE FROM dokumentasi WHERE kd_dokumentasi = '$_GET[id]'");

	echo"<script language='javascript'>window.location ='../master.php?module=data_dokumentasi'</script>";
?>
</body>
</html>