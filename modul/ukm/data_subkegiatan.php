<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php
switch($_GET['act']){
	default:
$ukm=$_SESSION['ukm'];
?>
<form method="post" action="">
<table>
<tr>
		<th>Kegiatan</th>
		<td>:</td>
		<td>
        <select name='kegiatan'>
        <option value=''>---pilih---</option>
			<?php 
		$sql=mysql_query("SELECT * from kegiatan where kd_ukm='$ukm'");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id]'>$data[nama_kegiatan]</option>";
		}
		?>
	<input name='ok' type='submit' value='Tampilkan' />
</select>
		</td>
</tr>
</table>
</form>
    
<h2><center>DATA SUB KEGIATAN</center></h2>
<table>

<tr>
		<th width='100' align='center'>NO</th>
        <th width='100' align='center'>KEGIATAN</th>
        <th width='100' align='center'>NAMA SUBKEGIATAN</th>
		<th width='100' align='center'>TEMPAT</th>
		<th width='100' align='center'>TANGGAL</th>
        <th width='100' align='center'>Aksi</th>
</tr>
<?php
if (isset($_POST['ok']))
{
$no=0;
$result=mysql_query("select * from subkegiatan,kegiatan where subkegiatan.id=kegiatan.id and subkegiatan.id='$_POST[kegiatan]'");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){
		$kegiatan=$data2['nama_kegiatan'];
		$nama=$data2['nm_subkegiatan'];
		$tempat=$data2['tempat_subkegiatan'];
		$date=tgl_indo(date($data2['tgl_subkegiatan']));
		$id=$data2['id'];
		$no++;

?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $kegiatan;?></td>
		<td><?php echo $nama;?></td>
        <td><?php echo $tempat;?></td>
		<td><?php echo $date;?></td>
        <td><a href="?module=data_subkegiatan&act=edit_sub&id=<?php echo $data2['kd_subkegiatan'];?>">Edit </a>| <a href="?module=data_subkegiatan&act=hapus_sub&id=<?php echo $data2['kd_subkegiatan'];?>" onClick="return confirm('Anda yakin ingin menghapus Subkegiatan <?php echo $data2['nm_subkegiatan']; ?>?');">Hapus</a></td>
</tr>
<?php
}
?>
<tr>
					<td colspan=15>Total Subkegiatan: <?php echo $numrows; ?></td>
</tr>
 <tr>
<td colspan=13><a href="modul/ukm/cetak_subkegiatan.php?keg=<?php echo $id;?>&nama=<?php echo $kegiatan;?>"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a>
</td></tr>


</table>
</body>
</html>
<?php
}
break;
case"edit_sub":
$data = mysql_fetch_array(mysql_query("SELECT * FROM subkegiatan WHERE kd_subkegiatan='$_GET[id]'"));
	?>
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>


<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
       	</script>
        
    </head>
    <body>    
        <form method='POST' action='' enctype="multipart/form-data" onSubmit="uploadGambar();">
        <h1><center>EDIT DATA SUBKEGIATAN</center></h1>
        <table>
	<tr>
		<td>Nama Sub Kegiatan</td>
		<td>:</td>
		<td>
			<input name='sub_keg' type='text' size='30' <?php echo"value='$data[nm_subkegiatan]'";?>>
		</td>
	</tr>
    <tr>
		<td>Tempat</td>
		<td>:</td>
		<td>
			<input name='tempat' type='text' size='30' <?php echo"value='$data[tempat_subkegiatan]'";?>>
		</td>
	</tr>
    <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><input type="text"  name="tgl" size='30' id="tanggal" <?php echo"value='$data[tgl_subkegiatan]'";?>/></td>
          </tr>
	<tr>
		<td colspan='2'></td>
		<td>
        	<input type="hidden" name="kd" <?php echo"value='$data[kd_subkegiatan]'";?> />
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
	$kd=$_POST['kd'];
	$sub=$_POST['sub_keg'];
	$tempat=$_POST['tempat'];
	$tanggal= $_POST['tgl'];		
	if(empty($sub))
{
	?><script language="javascript">alert("ISIKAN NAMA SUB KEGIATAN!!!")</script><?
}
elseif(empty($tempat))
{
	?><script language="javascript">alert("ISIKAN TEMPAT!!!")</script><?
}
elseif(empty($tanggal))
{
	?><script language="javascript">alert("ISIKAN TANGGAL!!!")</script><?
}
	else
	{

//disini berisi perintah penyimpanan atau prosedur simpan kedalam database
		mysql_query("UPDATE subkegiatan SET nm_subkegiatan='$sub',tempat_subkegiatan='$tempat',tgl_subkegiatan='$tanggal' where kd_subkegiatan='$kd'");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');window.location ='../master.php?module=data_subkegiatan';</script>";	
	}
	
}
break;
case"hapus_sub":
mysql_query("DELETE FROM subkegiatan WHERE kd_subkegiatan= '$_GET[id]'");
echo"<script language='javascript'>window.location ='../master.php?module=data_subkegiatan';</script>";	
break;
}
?>