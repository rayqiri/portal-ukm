<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>INPUT DATA RAPAT</title>

        
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
        <form method='POST' action='' enctype="multipart/form-data">
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>INPUT DATA RAPAT</center>
		</td>
	</tr>
	<tr>
		<td>Kegiatan</td>
		<td>:</td>
		<td>
        <select name='kegiatan'>
        <option value=''>---Pilih---</option>
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
		<td>Judul Rapat</td>
		<td>:</td>
		<td>
			<input name='judul' type='text' size='30' id='cari'>
		</td>
	</tr>
    <tr>
		<td>Tempat Rapat</td>
		<td>:</td>
		<td>
			<input name='tempat_rapat' type='text' size='30' id='cari3'>
		</td>
	</tr>
    <tr>
		<td>Jam</td>
		<td>:</td>
		<td>
			<input name='jam' type='text' size='30' id='cari2'>
		</td>
	</tr>
    <tr>
            <td>Tanggal Rapat</td>
            <td>:</td>
            <td><input type="text"  name="tanggal_rapat" size='30' id="tanggal"/></td>
          </tr>
	<tr>
     <tr>
            <td>Jumlah Presensi</td>
            <td>:</td>
            <td><input type="text"  name="presensi" size='30'/></td>
          </tr>
          <tr>
		<td>Hasil Rapat</td>
		<td>:</td>
		<td>
			<input name='file' type='file'>
		</td>
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
	$judul=$_POST['judul'];
	$tempat=$_POST['tempat_rapat'];
	$jam=$_POST['jam'];
	$tanggal= $_POST['tanggal_rapat'];
	$presensi= $_POST['presensi'];	
	$kd=$_SESSION['ukm'];	
	if ((empty($kegiatan)) or (empty($judul)) or (empty($tempat)) or (empty($jam)) or (empty($tanggal)) or (empty($tanggal)) or (empty($presensi)))
{	
	?><script language="javascript">alert("ISIKAN KOLOM YANG DISEDIAKAN!!!")</script><?
}
	else
	{
$file =$_FILES['file']['tmp_name'];
$file_type=$_FILES['file']['type'];
$file_size	=$_FILES['file']['size'];
if (!$file){
		echo "File belum ada<br>";
		echo "<a href='?module=input_rapat'>Kembali</a>";
		exit;
	}
	else{
		if ($file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			$nama_file_baru	=$judul."_".$tanggal."_".$kd.".docx";
		}
		else if($file_type=="image/jpeg"){
			$nama_file_baru	=$judul."_".$tanggal."_".$kd.".jpg";
		}
		else if($file_type=="image/png"){
			$nama_file_baru	=$judul."_".$tanggal."_".$kd.".png";
		}
		else if($file_type=="application/pdf"){
			$nama_file_baru	=$judul."_".$tanggal."_".$kd.".pdf";
		}
		else{
		//echo "file=$file<br>";
	//echo "file_type=$file_type<br>";
			echo "Format file tdk mendukung<br>";
			echo "<a href='?module=input_rapat'>Kembali</a>";
			exit;
		}
	}
	$maxsize=2000000;
	if ($file_size>$maxsize){
		echo "Ukuran file Terlalu Besar<br>";
			echo "<a href='?module=input_rapat'>Kembali</a>";
			exit;
	}else{
		$tujuan			="rapat/".$nama_file_baru;
	copy($file,$tujuan);
/*	$cekdata="select kd_dosen from dosen where kd_dosen='$kd_dosen'";

	$ada=mysql_query($cekdata) or die(mysql_error());

	if(mysql_num_rows($ada)>0)

	{ die?><script language="javascript">alert("KODE DOSEN TELAH TERDAFTAR!!!")</script><? }

*/
//disini berisi perintah penyimpanan atau prosedur simpan kedalam database
		mysql_query("insert into rapat(id_rapat,kd_ukm,id,judul,tempat_rapat,jam,tanggal_rapat,jumlah_presensi,hasil_rapat) values(null,'$ukm','$kegiatan','$judul','$tempat','$jam','$tanggal','$presensi','$nama_file_baru')");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');</script>";	
	}
	
}
}

?>