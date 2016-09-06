<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>INPUT APBU</title>
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
			<center>PENGAJUAN APBU</center>
		</td>
	</tr>
    <tr>
		<td>Jumlah Anggaran yang Diajukan</td>
		<td>:</td>
		<td>
			<input name='jumlah' type='text' size='30'>
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
	$ukm=$_SESSION['ukm'];
	$jumlah=$_POST['jumlah'];
	$a=mysql_query("select * from ukm where kd_ukm='$ukm'");
	$b=mysql_fetch_array($a);
	
	$nama=$b['nama_ukm'];
	$tgl=$_POST['tgl'];
	$thn=substr($tgl,0,4);
		if ((empty($jumlah)) or (empty($tgl)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?php
}else{
	$a=mysql_query("select * from apbu where kd_ukm='$ukm'");
	$b=mysql_fetch_array($a);
	if($b>0){
		?> <script language='javascript'>alert('ANDA SUDAH MENGINPUTKAN DATA APBU!!!')</script><?php
	}else{
	$file =$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];
$file_size	=$_FILES['file']['size'];
if (!$file){
		echo "File file belum ada<br>";
		echo "<a href='?module=apbu'>Kembali</a>";
		exit;
	}
	else{
		if ($file_type=="application/pdf"){
			$nama_file_baru	="proposal_".$nama."_".$thn.".pdf";
		}
		else{
		//echo "file=$file<br>";
	//echo "file_type=$file_type<br>";
			echo "Format file tdk mendukung<br>";
			echo "<a href='?module=apbu'>Kembali</a>";
			exit;
		}
	}
	$maxsize=2000000;
	if ($file_size>$maxsize){
		echo "Ukuran file Terlalu Besar<br>";
			echo "<a href='?module=apbu'>Kembali</a>";
			exit;
	}else{
	//$nama_file_baru	="img".$nim.".jpg";
	$tujuan			="apbu/".$nama_file_baru;
	copy($file,$tujuan);	
	
		mysql_query("insert into apbu(kd_ukm,thn_pengambilan,jumlah,keterangan,file) values('$ukm','$tgl','$jumlah','Menunggu','$tujuan')");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');</script>";	
	}
	}
}
}
?>