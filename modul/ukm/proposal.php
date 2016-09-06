<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>INPUT DATA PROPOSAL</title>
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
        <form method='POST' action='' enctype='multipart/form-data'>
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>INPUT DATA PROPOSAL</center>
		</td>
	</tr>
	<tr>
		<td>Kegiatan</td>
		<td>:</td>
		<td>
        <select name='kegiatan'>
			<?php 
		$sql=mysql_query("SELECT * from kegiatan where kd_ukm='$ukm' and status=''");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id]'>$data[nama_kegiatan]</option>";
}
echo "</select>";
		?>
		</td>
	</tr>
    <tr>
		<td>Jenis Proposal</td>
		<td>:</td>
		<td>
			<input name='proposal' type='text' size='30'>
		</td>
	</tr>
    <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><input name='tgl' type='text' size='30' id='tanggal'></td>
          </tr>
          <tr>
		<td>Upload File Proposal</td>
		<td>:</td>
		<td>
			<input name='file' type='file'>type file .PDF Max file 2MB
		</td>
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
	$kd=$_SESSION['ukm'];
	$kegiatan=$_POST['kegiatan'];
	$proposal=$_POST['proposal'];
	$tgl=$_POST['tgl'];
		if ((empty($kegiatan)) or (empty($proposal)) or (empty($tgl)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
} 
	$file =$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];
$file_size	=$_FILES['file']['size'];
if (!$file){
		echo "File file belum ada<br>";
		echo "<a href='?module=input_proposal'>Kembali</a>";
		exit;
	}
	else{
		if ($file_type=="application/pdf"){
			$nama_file_baru	=$proposal."_".$tgl."_".$kd.".pdf";
		}
		else{
		//echo "file=$file<br>";
	//echo "file_type=$file_type<br>";
			echo "Format file tdk mendukung<br>";
			echo "<a href='?module=input_proposal'>Kembali</a>";
			exit;
		}
	}
	$maxsize=2000000;
	if ($file_size>$maxsize){
		echo "Ukuran file Terlalu Besar<br>";
			echo "<a href='?module=input_proposal'>Kembali</a>";
			exit;
	}else{
	//$nama_file_baru	="img".$nim.".jpg";
	$tujuan			="proposal/".$nama_file_baru;
	copy($file,$tujuan);	
	
		mysql_query("insert into proposal(kd_proposal,kd_ukm,id,jenis_proposal,tgl_proposal,file) values(null,'$kd','$kegiatan','$proposal','$tgl','$nama_file_baru')");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');</script>";	
	
	}
}
?>