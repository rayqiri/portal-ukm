<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
<?php
$ukm=$_SESSION['ukm'];
switch($_GET['act']){
	default:
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
    
<h2><center>DATA SURAT HMJ TI UMK</center></h2>
<table border='1'>

<tr>
		<th width='100' align='center'>NO</th>
        <th width='100' align='center'>KEGIATAN</th>
         <th width='100' align='center'>KEPERLUAN</th>
        <th width='100' align='center'>JENIS SURAT</th>
		<th width='100' align='center'>NO SURAT</th>
		<th width='100' align='center'>TANGGAL</th>
        <th width='100' align='center'>LINK</th>
        <th width='100' align='center'>Aksi</th>
</tr>
<?php
if (isset($_POST['ok']))
{
$no=0;
$result=mysql_query("select * from surat,kegiatan where surat.id=kegiatan.id and surat.id='$_POST[kegiatan]'");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){
		$kegiatan=$data2['nama_kegiatan'];
		$id=$data2['id'];
		$surat=$data2['jns_surat'];
		$no_surat=$data2['no_surat'];
		$date=$data2['tgl_surat'];
		$link=$data2['link'];
		$no++;

?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $kegiatan;?></td>
        <td><?php echo $data2['judul_surat'];?></td>
		<td><?php echo $surat;?></td>
        <td><?php echo $no_surat;?></td>
		<td><?php echo $date;?></td>
        <td><?php echo"<a href='surat/$link'>DOWNLOAD</a>";?></td>
        <td><a href="?module=data_surat&act=edit_surat&id=<?php echo $data2['id_surat']; ?>">Edit</a> | <a href="?module=data_surat&act=hapus_surat&id=<?php echo $data2['id_surat']; ?>" onClick="return confirm('Anda yakin ingin menghapus Surat <?php echo $data2['judul_surat']; ?>?');">Hapus</a> </td>
</tr>
<?php
}
?>
<tr>
					<th colspan=15>Total Surat: <?php echo $numrows; ?></th>
</tr>

<tr>
<td colspan=13><a href="modul/ukm/cetak_surat.php?keg=<?php echo $id;?>&nama=<?php echo $kegiatan;?>"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a>
</td></tr>

<?php
}
echo"</table>
";
break;
case"edit_surat":
$data = mysql_fetch_array(mysql_query("SELECT * FROM surat WHERE id_surat = '$_GET[id]' and kd_ukm='$_SESSION[ukm]'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<?php
$ukm=$_SESSION['ukm'];
?>
<body>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>EDIT DATA SURAT</center>
		</td>
	</tr>
	<tr>
		<td>Jenis Surat</td>
		<td>:</td>
		<td>
        <select name='surat'>
        	<option value=''>---pilih---</option>
			<option value='surat masuk'<?php if($data['jns_surat']=="surat masuk"){echo"selected";}?>>Surat Masuk</option>
            <option value='surat keluar'<?php if($data['jns_surat']=="surat keluar"){echo"selected";}?>>Surat Keluar</option>
		</td>
	</tr>
    <tr>
		<td>Keperluan Surat</td>
		<td>:</td>
		<td>
			<input name='judul' type='text' size='30' <?php echo"value='$data[judul_surat]'";?>>
		</td>
	</tr>
    <tr>
		<td>No Surat</td>
		<td>:</td>
		<td>
			<input name='no_surat' type='text' size='30' <?php echo"value='$data[no_surat]'";?>>
		</td>
	</tr>
	<tr>
            <td>Tanggal Surat</td>
            <td>:</td>
            <td><input name="tgl_surat" type="text" size="30" id="tanggal" <?php echo"value='$data[tgl_surat]'";?>/></td>
          </tr>
    <tr>
		<td>Upload Surat</td>
		<td>:</td>
		<td><p><?php echo"$data[link]";?><br>
			<input name='file' type='file'/>Format file .docx Max file 2MB
		</td>
	</tr>
    
	<tr>
		<td colspan='2'></td>
		<td>
        	<input type='hidden' name='file_lama' <?php echo"value='$data[link]'";?> />
        	<input type='hidden' name='id' <?php echo"value='$data[id_surat]'";?> />
            <input type='hidden' name='jud' <?php echo"value='$data[judul_surat]'";?> />
            <input type='hidden' name='tgl' <?php echo"value='$data[tgl_surat]'";?> />
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
	$tgl=$_POST['tgl'];
	$id=$_POST['id'];
	$jud=$_POST['jud'];
	$kegiatan=$_POST['kegiatan'];
	$surat=$_POST['surat'];
	$judul=$_POST['judul'];
	$no_surat=$_POST['no_surat'];
	$tanggal= $_POST['tgl_surat'];	
	if ((empty($surat)) or (empty($no_surat)) or (empty($tanggal)) or (empty($judul)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
}else{	
	$file_tmp =  $_FILES['file']['tmp_name'];
$file_type = $_FILES['file']['type'];
$file_lama = $_POST['file_lama'];
$file_size	=$_FILES['file']['size'];
if($file_tmp==''){  #kondisi A
		if($file_lama==''){  #A1
			$nama_file = '';
		}
	else{  #A2
			if($file_lama==$jud."_".$tgl."_".$kd.'.docx'){
				$format = ".docx";
			}
			
			else{
				$format = ".pdf";
			}
			$nama_file = $judul."_".$tanggal."_".$kd.$format;
			$tempat_file_baru = "surat/".$nama_file;
			$tempat_file_lama = "surat/".$file_lama;
			rename($tempat_file_lama,$tempat_file_baru);
		}
	}
	else{  #kondisi B
		if($file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			$format = ".docx";
		}
		else{	
			#ditolak
			
			echo "File file tidak sesuai format<br>";
			echo "<a href='?module=data_surat&act=edit_judul&id=$id'>
					Kembali</a>";
			exit;
		}
		$nama_file = $judul."_".$tanggal."_".$kd.$format;
		$tempat_file_baru = "surat/".$nama_file;
		$tempat_file_lama = "surat/".$file_lama;
		$maxsize=2000000;
		if ($file_size>$maxsize){
		echo "Ukuran file Terlalu Besar<br>";
			echo "<a href='?module=data_surat&act=edit_judul&id=$id'>
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
//disini berisi perintah penyimpanan atau prosedur simpan kedalam database
		mysql_query("update surat set judul_surat='$judul',jns_surat='$surat',no_surat='$no_surat',link='$nama_file',tgl_surat='$tanggal' where id_surat='$id'");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');window.location ='../ukm/master.php?module=data_surat'</script>";	
	
}
}
?>
</body>
</html>


<?php
break;
case"hapus_surat":
$sql=mysql_query("select * from surat where id_surat='$_GET[id]'");
$ada=mysql_fetch_array($sql);
$hapus_file="surat/".$ada['link'];
if($ada>0){
unlink($hapus_file);	
}
mysql_query("DELETE FROM surat WHERE id_surat = '$_GET[id]'");

	echo"<script language='javascript'>window.location ='../ukm/master.php?module=data_surat'</script>";
break;

}
?>