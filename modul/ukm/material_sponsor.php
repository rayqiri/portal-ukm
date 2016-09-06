<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dana Hmj Ti UMK</title>
</head>

<body>
<?php
switch($_GET['act']){
	default:
$kd=$_GET['id'];
$ins=$_GET['ins'];
?>
    
<h2><center>DATA MATERIAL SPONSOR <?php echo $ins;?></center></h2>
<table border='1'>

<tr>
		<th width='100' align='center'>NO</th>
        <th width='100' align='center'>JENIS</th>
        <th width='100' align='center'>JUMLAH</th>
		<th width='100' align='center'>SATUAN</th>
        <th width='100' align='center'>Aksi</th>
</tr>
<?php

$no=0;
$result=mysql_query("select * from material_sponsor where id_sponsor='$kd'");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){
		$no++;

?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $data2['jenis'];?></td>
		<td><?php echo $data2['jumlah'];?></td>
        <td><?php echo $data2['satuan'];?></td>
        <td><a href="?module=data_materialsponsor&act=edit_material&id=<?php echo $data2['kd_material_sponsor'];?>">Edit</a>| <a href="?module=data_materialsponsor&act=hapus_material&id=<?php echo $data2['kd_material_sponsor'];?>" onClick="return confirm('Anda yakin ingin menghapus ini ?');">Hapus</a></td>
</tr>
<?php
}
?>
<tr>
					<th colspan=15>Total Material Sponsor: <?php echo $numrows; ?></th>
</tr>

</table>

<?php

break;
case"edit_material":
$data = mysql_fetch_array(mysql_query("SELECT * FROM material_sponsor WHERE kd_material_sponsor='$_GET[id]'"));
	?>
	<head>
<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>

        
    </head>
    <body>    
        <form method='POST' action='' enctype="multipart/form-data" onSubmit="uploadGambar();">
        <h1><center>EDIT DATA MATERIAL SPONSOR</center></h1>
        <table>
	<tr>
		<td>Jenis</td>
		<td>:</td>
		<td>
			<input name='jenis' type='text' size='30' <?php echo"value='$data[jenis]'";?>>
		</td>
	</tr>
    <tr>
		<td>Jumlah</td>
		<td>:</td>
		<td>
			<input name='jumlah' type='text' size='30' <?php echo"value='$data[jumlah]'";?>>
		</td>
	</tr>
    <tr>
            <td>Satuan</td>
            <td>:</td>
            <td><input type="text"  name="satuan" size='30'<?php echo"value='$data[satuan]'";?>/></td>
          </tr>
	<tr>
		<td colspan='2'></td>
		<td>
        	<input type="hidden" name="kd" <?php echo"value='$data[kd_material_sponsor]'";?> />
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
		</td>
	</tr>
</table>
</form>
    </body>
</html>
<?php

if(isset($_POST['save']))
{
	$id=$_POST['kd'];
	$jenis=$_POST['jenis'];
	$jumlah=$_POST['jumlah'];
	$satuan= $_POST['satuan'];		
	if ((empty($jenis)) or (empty($jumlah)) or (empty($satuan)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
} 
	else
	{

//disini berisi perintah penyimpanan atau prosedur simpan kedalam database
		mysql_query("UPDATE material_sponsor SET jenis='$jenis',jumlah='$jumlah',satuan='$satuan' where kd_material_sponsor='$id'");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');window.location ='../ukm/master.php?module=data_sponsor';</script>";	
	}
	
}
break;
case"hapus_material":
mysql_query("DELETE FROM material_sponsor WHERE kd_material_sponsor= '$_GET[id]'");
echo"<script language='javascript'>window.location ='../ukm/master.php?module=data_sponsor';</script>";	
break;
}
?>