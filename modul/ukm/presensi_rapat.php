<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>INPUT Presensi Rapat</title>
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
        <form method='POST' action='' enctype='multipart/form-data'>
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>PRESENSI RAPAT</center>
		</td>
	</tr>
	<tr>
		<td>Rapat</td>
		<td>:</td>
		<td>
        <select name='rapat'>
			<?php 
		$sql=mysql_query("SELECT * from rapat");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id_rapat]'>$data[judul]</option>";
}
echo "</select>";
		?>
		</td>
	</tr>
    <tr>
		<td>Jumlah Anggota Hadir</td>
		<td>:</td>
		<td>
			<input name='jumlah' type='text' size='30'>
		</td>
	</tr>
    <tr>
            <td>Tanggal Rapat</td>
            <td>:</td>
            <td><input name='tgl' type='text' size='30' id='tanggal'></td>
          </tr>
	<tr>
		<td colspan='2'></td>
		<td>
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Kembali' onclick=\"window.location.href='?module=data_dosen';\">";?>
		</td>
	</tr>
</table>
</form>
    </body>
</html>
<?php
if(isset($_POST['save']))
{
	$rapat=$_POST['rapat'];
	$jumlah=$_POST['jumlah'];
	$tgl=$_POST['tgl'];
		if ((empty($rapat)) or (empty($jumlah)) or (empty($tgl)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
} 
	
	
		mysql_query("insert into presensi_rapat(id_rapat,jumlah,tanggal) values('$rapat','$jumlah','$tgl')");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');</script>";	
	
	
}
?>