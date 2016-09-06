
<html>
<head>
        <title>INPUT DATA KEGIATAN</title>

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
        <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal2").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
       	</script>
    </head>
    <body>    
        <form method='POST' action='' enctype="multipart/form-data">
        <h1><center>INPUT DATA KEGIATAN</center></h1>
        <table>
	<tr>
		<td>Nama Kegiatan</td>
		<td>:</td>
		<td>
			<input name='nama' type='text' size='30' id='cari2'>
		</td>
	</tr>
    <tr>
            <td>Tempat Kegiatan</td>
            <td>:</td>
            <td><input name='tempat' type='text' size-'30'></td>
    </tr>
    <tr>
            <td>Tanggal Mulai</td>
            <td>:</td>
            <td><input type="text"  name="tgl_mulai" id="tanggal"/></td>
          </tr>
          <tr>
            <td>Tanggal Selesai</td>
            <td>:</td>
            <td><input type="text"  name="tgl_selesai" id="tanggal2"/></td>
          </tr>
    <tr>
            <td>Pamflet</td>
            <td>:</td>
            <td><input name='file' type='file'></td>
    </tr>
	<tr>
		<td colspan='2'></td>
		<td>
			<input name='simpan' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Back' onclick='javascript.history.back()'>";?>
		</td>
	</tr>

<?php

if(isset($_POST['simpan']))
{
	$ukm=$_SESSION['ukm'];
	$nama=$_POST['nama'];
	$tempat=$_POST['tempat'];
	$tanggal_kegiatan = $_POST['tgl_mulai'];
	$tanggal_kegiatan2 = $_POST['tgl_selesai'];
if ((empty($nama)) or (empty($tempat)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
} 
$foto		=$_FILES['file']['tmp_name'];
$foto_type	=$_FILES['file']['type'];


	if (!$foto){
		echo "File foto belum ada<br>";
		echo "<a href='?module=input_kegiatan'>Kembali</a>";
		exit;
	}
	else{
		if ($foto_type=="image/png"){
			$nama_foto_baru	=$nama."_".$tanggal_kegiatan."_".$ukm.".png";
		}
		else if($foto_type=="image/jpeg"){
			$nama_foto_baru	=$nama."_".$tanggal_kegiatan."_".$ukm.".jpg";
		}
		else{
			echo "Format foto tdk mendukung<br>";
			echo "<a href='?module=input_kegiatan'>Kembali</a>";
			exit;
		}
	}
	$tujuan			="kegiatan/".$nama_foto_baru;
	copy($foto,$tujuan);
	mysql_query("insert into kegiatan(kd_ukm,nama_kegiatan,tempat,tanggal_mulai,tanggal_selesai,photo) values('$ukm','$nama','$tempat','$tanggal_kegiatan','$tanggal_kegiatan2','$nama_foto_baru')");
echo"<script language='javascript'>alert('DATA TERSIMPAN');</script>";

}

?>
</table>
</form>
    </body>
</html>
