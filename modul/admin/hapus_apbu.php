<?
$sql=mysql_query("select file from apbu where id_apbu='$_GET[id]'");
$ada=mysql_fetch_array($sql);
$hapus_file=$ada['file'];
if($ada>0){
unlink($hapus_file);	
}
mysql_query("DELETE FROM apbu WHERE id_apbu = '$_GET[id]'");

	echo"<script language='javascript'>window.location ='../ukm/master.php?module=data_apbu'</script>";
	?>