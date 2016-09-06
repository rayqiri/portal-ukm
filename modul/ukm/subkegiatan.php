<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>INPUT SUBKEGIATAN</title>

        
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
    <?php
	$ukm=$_SESSION['ukm'];
	?>
        <form method='POST' action=''>
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>INPUT SUB KEGIATAN</center>
		</td>
	</tr>
	<tr>
		<td>Kegiatan</td>
		<td>:</td>
		<td>
        <select name='kegiatan'>
        <option value="">---Pilih Kegiatan---</option>
			<?php 
		$sql=mysql_query("SELECT * from kegiatan where kd_ukm='$ukm'");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id]'>$data[nama_kegiatan]</option>";
}
echo "</select>";
		?>
		</td>
	</tr>
	<tr>
		<td>Nama Sub Kegiatan</td>
		<td>:</td>
		<td>
			<input name='sub_keg' type='text' size='30'>
		</td>
	</tr>
    <tr>
		<td>Tempat</td>
		<td>:</td>
		<td>
			<input name='tempat' type='text' size='30'>
		</td>
	</tr>
    <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><input type="text"  name="tgl" size='30' id="tanggal"/></td>
          </tr>
	<tr>
		<td colspan='2'></td>
		<td>
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Kembali' onclick=\"window.location.href='?module=data_';\">";?>
		</td>
	</tr>
</table>
</form>
    </body>
</html>
<?php

if(isset($_POST['save']))
{
	$kegiatan=$_POST['kegiatan'];
	$sub=$_POST['sub_keg'];
	$tempat=$_POST['tempat'];
	$tanggal= $_POST['tgl'];		
	if (empty($kegiatan))
{	
	?><script language="javascript">alert("ISIKAN KEGIATAN!!!")</script><?
} 
elseif(empty($sub))
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
/*	$cekdata="select kd_dosen from dosen where kd_dosen='$kd_dosen'";

	$ada=mysql_query($cekdata) or die(mysql_error());

	if(mysql_num_rows($ada)>0)

	{ die?><script language="javascript">alert("KODE DOSEN TELAH TERDAFTAR!!!")</script><? }

*/
//disini berisi perintah penyimpanan atau prosedur simpan kedalam database
		mysql_query("insert into subkegiatan(id,nm_subkegiatan,tempat_subkegiatan,tgl_subkegiatan) values('$kegiatan','$sub','$tempat','$tanggal')");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');window.location ='../ukm/master.php?module=data_subkegiatan';</script>";	
	}
	
}
?>