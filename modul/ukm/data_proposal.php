<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Proposal</title>
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
    
<h2><center>DATA PROPOSAL</center></h2>
<table border='1'>

<tr>
		<th width='100' align='center'>NO</th>
        <th width='100' align='center'>KEGIATAN</th>
        <th width='100' align='center'>JENIS PROPOSAL</th>
		<th width='100' align='center'>TANGGAL</th>
        <th width='100' align='center'>FILE</th>
         <th width='100' align='center'>Aksi</th>
</tr>
<?php
if (isset($_POST['ok']))
{
$no=0;
$result=mysql_query("select * from proposal,kegiatan where proposal.id=kegiatan.id and proposal.id='$_POST[kegiatan]'");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){
		$kegiatan=$data2['nama_kegiatan'];
		$proposal=$data2['jenis_proposal'];
		$date=tgl_indo(date($data2['tgl_proposal']));
		$link=$data2['file'];
		$no++;

?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $kegiatan;?></td>
		<td><?php echo $proposal;?></td>
		<td><?php echo $date;?></td>
        <td><?php echo"<a href='proposal/$link'>DOWNLOAD</a>";?></td>
        <td><a href="?module=data_proposal&act=edit_proposal&id=<?php echo $data2['kd_proposal']; ?>">Edit</a> | <a href="?module=data_proposal&act=hapus_proposal&id=<?php echo $data2['kd_proposal']; ?>" onClick="return confirm('Anda yakin ingin menghapus Proposal <?php echo $data2['jenis_proposal']; ?>?');">Hapus</a> </td>
</tr>
<?php
}
?>
<tr>
					<th colspan=15>Total Proposal: <?php echo $numrows; ?></th>
</tr>

</table>

<?php
}else{
$no=0;
$result2=mysql_query("select * from proposal,kegiatan where proposal.id=kegiatan.id and proposal.kd_ukm='$ukm'");
$numrows2=mysql_num_rows($result2);
while($data3=mysql_fetch_array($result2)){
		$kegiatan=$data3['nama_kegiatan'];
		$proposal=$data3['jenis_proposal'];
		$date=tgl_indo(date($data3['tgl_proposal']));
		$link=$data3['file'];
		$no++;

?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $kegiatan;?></td>
		<td><?php echo $proposal;?></td>
		<td><?php echo $date;?></td>
        <td><?php echo"<a href='proposal/$link'>DOWNLOAD</a>";?></td>
        <td><a href="?module=data_proposal&act=edit_proposal&id=<?php echo $data3['kd_proposal']; ?>">Edit</a> | <a href="?module=data_proposal&act=hapus_proposal&id=<?php echo $data3['kd_proposal']; ?>" onClick="return confirm('Anda yakin ingin menghapus Proposal <?php echo $data3['jenis_proposal']; ?>?');">Hapus</a> </td>
</tr>
<?php
}
?>
<tr>
					<th colspan=15>Total Proposal: <?php echo $numrows2; ?></th>
</tr>
</table>
<?php
}
break;
case"edit_proposal":
$data = mysql_fetch_array(mysql_query("SELECT * FROM proposal WHERE kd_proposal = '$_GET[id]' and kd_ukm='$_SESSION[ukm]'"));
?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
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
			<center>EDIT DATA PROPOSAL</center>
		</td>
	</tr>
    <tr>
		<td>Jenis Proposal</td>
		<td>:</td>
		<td>
			<input name='proposal' type='text' size='30' <?php echo"value='$data[jenis_proposal]'";?>>
		</td>
	</tr>
    <tr>
            <td>Tanggal</td>
            <td>:</td>
            <td><input name='tgl' type='text' size='30' id='tanggal' <?php echo"value='$data[tgl_proposal]'";?>></td>
          </tr>
          <tr>
		<td>Upload File Proposal</td>
		<td>:</td>
		<td><p><?php echo"$data[file]";?><br>
			<input name='file' type='file'>Format file .PDF Max size 2MB
		</td>
	</tr>
	<tr>
		<td colspan='2'></td>
		<td>
        	<input type='hidden' name='file_lama' <?php echo"value='$data[file]'";?> />
        	<input type='hidden' name='id' <?php echo"value='$data[kd_proposal]'";?> />
            <input type='hidden' name='prop' <?php echo"value='$data[jenis_proposal]'";?> />
             <input type='hidden' name='tanggal' <?php echo"value='$data[tgl_proposal]'";?> />
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Kembali' onclick=\"window.location.href='?module=data_proposal';\">";?>
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
	$id=$_POST['id'];
	$proposal=$_POST['proposal'];
	$tgl=$_POST['tgl'];
	$prop=$_POST['prop'];
	$tanggal=$_POST['tanggal'];
		if ((empty($proposal)) or (empty($tgl)))
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
			if($file_lama==$prop."_".$tanggal."_".$kd.'.pdf'){
				$format = ".pdf";
			}
			
			else{
				$format = ".pdf";
			}
			$nama_file = $proposal."_".$tgl."_".$kd.$format;
			$tempat_file_baru = "proposal/".$nama_file;
			$tempat_file_lama = "proposal/".$file_lama;
			rename($tempat_file_lama,$tempat_file_baru);
		}
	}
	else{  #kondisi B
		if($file_type=="application/pdf"){
			$format = ".pdf";
		}
		else{	
			#ditolak
			
			echo "File file tidak sesuai format<br>";
			echo "<a href='?module=data_proposal&act=edit_proposal&id=$id'>
					Kembali</a>";
			exit;
		}
		$nama_file = $proposal."_".$tgl."_".$kd.$format;
		$tempat_file_baru = "proposal/".$nama_file;
		$tempat_file_lama = "proposal/".$file_lama;
		$maxsize=2000000;
		if ($file_size>$maxsize){
		echo "Ukuran file Terlalu Besar<br>";
			echo "<a href='?module=data_proposal&act=edit_proposal&id=$id'>
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
		mysql_query("UPDATE proposal set jenis_proposal='$proposal',tgl_proposal='$tgl',file='$nama_file' where kd_proposal='$id'");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');window.location ='../master.php?module=data_proposal'</script>";	
	
	
}
break;
case"hapus_proposal":
$sql=mysql_query("select file from proposal where kd_proposal='$_GET[id]'");
$ada=mysql_fetch_array($sql);
$hapus_file="proposal/".$ada['file'];
if($ada>0){
unlink($hapus_file);	
}
mysql_query("DELETE FROM proposal WHERE kd_proposal = '$_GET[id]'");

	echo"<script language='javascript'>window.location ='../master.php?module=data_proposal'</script>";
break;
?>



<?php
}
?>
