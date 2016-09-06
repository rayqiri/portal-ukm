<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Akun</title>
</head>

<body>
<?php
$sql=mysql_query("select * from akun where id_akun='$_GET[id]'");
$data=mysql_fetch_array($sql);
?>
<h1><center>EDIT USERNAME</center></h1>
<form method="post" action="" enctype="multipart/form-data">
<table>
<tr>
	<td>Username</td>
    <td>:</td>
    <td><input name="username" type="text" size="20" value="<?php echo $data['username'];?>"/>
   </td>
</tr>
<tr>
	<td colspan="2">
    <input type="hidden" name="id" value="<?php echo $data['id_akun'];?>" />
    <input name="simpan" type="submit" value="Simpan" />
    <input type='reset' name='reset' value='Batal'>
            </td>
</tr>    
</table>
</form>
<?php
if (isset($_POST['simpan'])){
$ukm=$_POST['ukm'];
$username=$_POST['username'];
$id=$_POST['id'];

	mysql_query("UPDATE akun SET username='$username' where id_akun='$id'");
	
	?><script language="javascript">alert("DATA TERUPDATE!!!");window.location ='../master.php?module=manajemen_user'</script><?php

}
?>
  
</body>
</html>