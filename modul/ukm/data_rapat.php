<?php
switch($_GET['act']){
	default:
	include "fungsi/class_paging.php";
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
		$sql2=mysql_query("SELECT * from kegiatan where kd_ukm='$_SESSION[ukm]'");
		while ($data2 = mysql_fetch_array($sql2)){
	echo "<option value='$data2[id]'>$data2[nama_kegiatan]</option>";
		}
		?>
	<input name='ok' type='submit' value='Tampilkan' />
</select>
		</td>
</tr>
</table>
</form>
							<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:20%">Kegiatan</th>
									<th style="width:21%">Agenda Rapat</th>
									<th style="width:21%">Tempat</th>
									<th style="width:21%">Jam</th>
									<th style="width:21%">Tanggal</th>
                                    <th style="width:21%">Hasil Rapat</th>
                                    <th style="width:21%">Aksi</th>
								</tr>
                                <?php
								if (isset($_POST['ok']))
{
								$sql = mysql_query("SELECT * from rapat,kegiatan where rapat.id=kegiatan.id and rapat.kd_ukm='$_SESSION[ukm]' and rapat.id='$_POST[kegiatan]' ORDER BY rapat.id_rapat ASC");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									$kegiatan=$data['nama_kegiatan'];
									$id=$data['id'];
									?>
                                    
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama_kegiatan']; ?></td>
										<td><?php echo $data['judul']; ?></td>
										<td><?php echo $data['tempat_rapat']; ?></td>
										<td><?php echo $data['jam']; ?></td>
                                        <td><?php echo tgl_indo(date($data['tanggal_rapat'])); ?></td>
                                        <?php
										if(empty($data['hasil_rapat'])){
											$a="Download";
										}else{$a="<a href='rapat/".$data['hasil_rapat']."'>Download</a>";
										}
										?>
                                        <td><?php echo $a;?></td>
                                        <td><a href="?module=data_rapat&act=edit_rapat&id=<?php echo $data['id_rapat']; ?>">Edit</a> | <a href="?module=data_rapat&act=hapus_rapat&id=<?php echo $data['id_rapat']; ?>" onClick="return confirm('Anda yakin ingin menghapus Agenda <?php echo $data['judul']; ?>?');">Hapus</a> </td>
									</tr>
									<?php
									$no++;
								}
}
?>
								
<tr>
<td colspan=13><a href="modul/ukm/cetak_rapat.php?keg=<?php echo $id;?>&nama=<?php echo $kegiatan;?>"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a>
</td></tr>								
				</table>
			
				
			                                 
</body>
</html>
<?php
break;

case"edit_rapat":
$data = mysql_fetch_array(mysql_query("SELECT * FROM rapat WHERE id_rapat = '$_GET[id]' and kd_ukm='$_SESSION[ukm]'"));
?>
<html>
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
<form method='POST' action='' enctype="multipart/form-data">
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>EDIT DATA RAPAT</center>
		</td>
	</tr>
	<tr>
		<td>Judul Rapat</td>
		<td>:</td>
		<td>
			<input name='judul' type='text' size='30' <?php echo"value='$data[judul]'";?>>
		</td>
	</tr>
    <tr>
		<td>Tempat Rapat</td>
		<td>:</td>
		<td>
			<input name='tempat_rapat' type='text' size='30' <?php echo"value='$data[tempat_rapat]'";?>>
		</td>
	</tr>
    <tr>
		<td>Jam</td>
		<td>:</td>
		<td>
			<input name='jam' type='text' size='30' id='cari2' <?php echo"value='$data[jam]'";?>>
		</td>
	</tr>
    <tr>
            <td>Tanggal Rapat</td>
            <td>:</td>
            <td><input type="text"  name="tgl_rapat" size='30' id="tanggal" <?php echo"value='$data[tanggal_rapat]'";?>/></td>
          </tr>
	<tr>
    <tr>
            <td>Hasil Rapat</td>
            <td>:</td>
            <td><p><?php echo"$data[hasil_rapat]";?><br>
            <input type="file"  name="file"/></td>Max File 2MB
          </tr>
	<tr>
		<td colspan='2'></td>
		<td>
        	<input type='hidden' name='file_lama' <?php echo"value='$data[hasil_rapat]'";?> />
        	<input type='hidden' name='id' <?php echo"value='$data[id_rapat]'";?> />
            <input type='hidden' name='jdl' <?php echo"value='$data[judul]'";?> />
            <input type='hidden' name='tgl' <?php echo"value='$data[tanggal_rapat]'";?> />
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
	$kd=$_SESSION['ukm'];
	$id=$_POST['id'];
	$judul=$_POST['judul'];
	$tempat=$_POST['tempat_rapat'];
	$jam=$_POST['jam'];
	$tanggal= $_POST['tgl_rapat'];		
	$jdl=$_POST['jdl'];
	$tgl=$_POST['tgl'];
$file_tmp =  $_FILES['file']['tmp_name'];
$file_type = $_FILES['file']['type'];
$file_lama = $_POST['file_lama'];
$file_size	=$_FILES['file']['size'];
	if($file_tmp==''){  #kondisi A
		if($file_lama==''){  #A1
			$nama_file = '';
		}
	else{  #A2
			if($file_lama==$jdl."_".$tgl."_".$kd.'.jpg'){
				$format = ".jpg";
			}
			elseif($file_lama==$jdl."_".$tgl."_".$kd.'.docx'){
				$format = ".docx";
			}
			elseif($file_lama==$jdl."_".$tgl."_".$kd.'.pdf'){
				$format = ".pdf";
			}
			else{
				$format = ".png";
			}
			$nama_file = $judul."_".$tanggal."_".$kd.$format;
			$tempat_file_baru = "rapat/".$nama_file;
			$tempat_file_lama = "rapat/".$file_lama;
			rename($tempat_file_lama,$tempat_file_baru);
		}
	}
	else{  #kondisi B
		if($file_type=="image/jpeg"){	
			$format = ".jpg";
		}
		else if($file_type=="image/png"){
			$format = ".png";
		}
		else if($file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
			$format = ".docx";
		}
		else if($file_type=="application/pdf"){
			$format = ".pdf";
		}
		else{	
			#ditolak
			
			echo "File file tidak sesuai format<br>";
			echo "<a href='?module=data_rapat&act=edit_rapat&id=$id'>
					Kembali</a>";
			exit;
		}
		$nama_file = $judul."_".$tanggal."_".$kd.$format;
		$tempat_file_baru = "rapat/".$nama_file;
		$tempat_file_lama = "rapat/".$file_lama;
		$maxsize=2000000;
		if ($file_size>$maxsize){
		echo "Ukuran file Terlalu Besar<br>";
			echo "<a href='?module=data_rapat&act=edit_rapat&id=$id'>
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

		mysql_query("update rapat set judul='$judul',tempat_rapat='$tempat',jam='$jam',tanggal_rapat='$tanggal',hasil_rapat='$nama_file' where id_rapat='$id'");

echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');window.location ='../master.php?module=data_rapat'</script>";
	
	

	
}
break;
case"hapus_rapat":
$sql=mysql_query("select hasil_rapat from rapat where id_rapat='$_GET[id]'");
$ada=mysql_fetch_array($sql);
$hapus_file="rapat/".$ada['hasil_rapat'];
if($ada>0){
unlink($hapus_file);	
}
mysql_query("DELETE FROM rapat WHERE id_rapat = '$_GET[id]'");

	echo"<script language='javascript'>window.location ='../master.php?module=data_rapat'</script>";
	
break;

}
?>