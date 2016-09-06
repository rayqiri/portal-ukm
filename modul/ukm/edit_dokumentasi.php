<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$data = mysql_fetch_array(mysql_query("SELECT * FROM dokumentasi WHERE kd_dokumentasi = '$_GET[id]' and kd_ukm='$_SESSION[ukm]'"));
?>
<form method='POST' action='' enctype="multipart/form-data">
 <table>
	<tr>
		<td height='50' colspan='3'>
			<center>EDIT DOKUMENTASI</center>
		</td>
	</tr>
 <tr>
		<td>Upload File Dokumentasi</td>
		<td>:</td>
		<td><img src="dokumentasi/<?php echo $data['dokumentasi'];?>" width="80" height="100" /><br />
			<input name='file' type='file'>file gambar
		</td>
	</tr>
 <tr>
		<td>Keterangan</td>
		<td>:</td>
		<td>
			<input name='ket' type='text' size='30' <?php echo"value='$data[keterangan]'";?>>
		</td>
	</tr>
    <tr>
		<td colspan='2'></td>
		<td>
       		<input type='hidden' name='file_lama' <?php echo"value='$data[dokumentasi]'";?> />
        	<input type='hidden' name='id' <?php echo"value='$data[kd_dokumentasi]'";?> />
            <input type='hidden' name='keterangan' <?php echo"value='$data[keterangan]'";?> />
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
		</td>
	</tr>
</table>
</form>
<?php
if(isset($_POST['save']))
{
	$kd=$_SESSION['ukm'];
	$ket=$_POST['ket'];
	$keterangan=$_POST['keterangan'];
	$id=$_POST['id'];
		if (empty($ket))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
} 
$file_tmp =  $_FILES['file']['tmp_name'];
$file_type = $_FILES['file']['type'];
$file_lama = $_POST['file_lama'];
$file_size	=$_FILES['file']['size'];
if($file_tmp==''){  #kondisi A
		if($file_lama==''){  #A1
			$nama_file = '';
		}
	else{  #A2
			if($file_lama=="img".$keterangan."_".$kd.'.jpg'){
				$format = ".jpg";
			}
			
			else{
				$format = ".png";
			}
			$nama_file ="img".$ket."_".$kd.$format;
			$tempat_file_baru = "dokumentasi/".$nama_file;
			$tempat_file_lama = "dokumentasi/".$file_lama;
			rename($tempat_file_lama,$tempat_file_baru);
		}
	}
	else{  #kondisi B
		if($file_type=="image/jpeg"){
			$format = ".jpg";
		}elseif($file_type=="image/png"){
			$format=".png";}
		else{	
			#ditolak
			
			echo "File file tidak sesuai format<br>";
			echo "<a href='?module=edit_dokumentasi&id=$id'>
					Kembali</a>";
			exit;
		}
		$nama_file = "img".$ket."_".$kd.$format;
		$tempat_file_baru = "dokumentasi/".$nama_file;
		$tempat_file_lama = "dokumentasi/".$file_lama;
		$maxsize=1000000;
		if ($file_size>$maxsize){
		echo "Ukuran foto Terlalu Besar<br>";
			echo "<a href='?module=edit_dokumentasi&id=$id'>
					Kembali</a>";
			exit;
	}else{
		if($file_lama==''){
			copy($file_tmp,$tempat_file_baru);
		}
		else{
			unlink($tempat_file_lama);
			copy($file_tmp,$tempat_file_baru);
		}
	}
	}
	mysql_query("UPDATE dokumentasi set dokumentasi='$nama_file',keterangan='$ket' where kd_dokumentasi='$id'");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');window.location ='../master.php?module=data_dokumentasi'</script>";	

}
?>
</body>
</html>