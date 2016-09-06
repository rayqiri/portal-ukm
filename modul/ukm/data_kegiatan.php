<br>
<?php
switch($_GET['act']){
	default:
	
	include "fungsi/class_paging.php";
	$ukm=$_SESSION['ukm'];
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM kegiatan where kd_ukm='$ukm'"));
?>
<h2><span>Informasi Kegiatan, Total: <?php echo $Num_Rows; ?> Kegiatan</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah Kegiatan' onclick=\"window.location.href='?module=input_kegiatan';\">";?></th>
                </tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:20%">Nama Kegiatan</th>
                                    <th style="width:20%">Ketua Kegiatan</th>
									<th style="width:20%">Tempat Kegiatan</th>
                                    <th style="width:20%">Tanggal Mulai</th>
                                    <th style="width:20%">Tanggal Selesai</th>
                                    <th style="width:20%">Status Kegiatan</th>
                                     <th style="width:20%">Pamflet</th>
                                    <th style="width:15%">Edit</th>
                                    <th style="width:15%">Hapus</th>
								</tr>
                                <?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM kegiatan,kepanitiaan where kegiatan.id=kepanitiaan.id and kegiatan.kd_ukm='$ukm' ORDER BY kegiatan.id ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama_kegiatan']; ?></td>
                                        <td><a href="?module=data_panitia&id=<?php echo $data['id']; ?>&keg=<?php echo $data['nama_kegiatan']; ?>"><?php echo $data['ketua']; ?></a></td>
										<td><?php echo $data['tempat']; ?></td>
                                        <td><?php echo tgl_indo(date($data['tanggal_mulai']));?></td>
                                        <td><?php echo tgl_indo(date($data['tanggal_selesai']));?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td><img src="kegiatan/<?php echo $data['photo'];?>" width="80" height="50" /></td>
                                        <td><a href="?module=data_kegiatan&act=edit_kegiatan&id=<?php echo $data['id']; ?>">Edit</a></td><td> <a href="?module=data_kegiatan&act=hapus_kegiatan&id=<?php echo $data['id'];?>" onClick="return confirm('Anda yakin ingin menghapus Kegiatan <?php echo $data['nama_kegiatan']; ?>?');">Hapus</a> </td>
									</tr>
									<?php
									$no++;
								}
								echo "</table>";
								?>
								</div>
							</div>
						</td>
					</tr>
                    <tr>
<td colspan=13><a href="modul/ukm/cetak_kegiatan.php"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a>
</td></tr>
				</table>
			
				<table>
					<tr>
						<td>
							<?php
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kegiatan where kd_ukm='$ukm'"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

							echo "<div id='paging'>Hal: $linkHalaman </div>";
							?>
						</td>
					</tr>
				</table>
			<div style="clear: both"></div>
                                        
</body>
</html>
<?php
break;
case"edit_kegiatan":
$data = mysql_fetch_array(mysql_query("SELECT * FROM kegiatan WHERE id='$_GET[id]' and kd_ukm='$_SESSION[ukm]'"));
	?>
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
        <h1><center>EDIT DATA KEGIATAN</center></h1>
        <table>
	<tr>
		<td>Nama Kegiatan</td>
		<td>:</td>
		<td>
			<input name='nama' type='text' size='30' id='cari2' <?php echo"value='$data[nama_kegiatan]'";?>>
		</td>
	</tr>
    <tr>
            <td>Tempat Kegiatan</td>
            <td>:</td>
            <td><input name='tempat' type='text' size-'30' id='cari3' <?php echo"value='$data[tempat]'";?>></td>
    </tr>
    <tr>
            <td>Tanggal Mulai</td>
            <td>:</td>
            <td><input type="text"  name="tgl_kegiatan" id="tanggal" <?php echo"value='$data[tanggal_mulai]'";?>></td>
          </tr>
          <tr>
            <td>Tanggal Selesai</td>
            <td>:</td>
            <td><input type="text"  name="tgl_kegiatan2" id="tanggal2" <?php echo"value='$data[tanggal_selesai]'";?>></td>
          </tr>
          <tr>
            <td>Pamflet</td>
            <td>:</td>
            <td><img src="kegiatan/<?php echo $data['photo'];?>" width="80" height="100" /><br /><input name='file' type='file'></td>
    </tr>
	<tr>
		<td colspan='2'></td>
		<td>
        <input type='hidden' name='kd' <?php echo"value='$data[id]'";?>>
        <input type='hidden' name='file_lama' <?php echo"value='$data[photo]'";?> />
        	<input type='hidden' name='tgl' <?php echo"value='$data[tanggal_mulai]'";?> />
            <input type='hidden' name='keg' <?php echo"value='$data[nama_kegiatan]'";?>>
			<input name='simpan' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			
		</td>
	</tr>
</table>
</form>
<?php
if($_POST['simpan'])
{
	$kd=$_SESSION['ukm'];
	$tgl=$_POST['tgl'];
	$keg=$_POST['keg'];
	$id=$_POST['kd'];
	$nama=$_POST['nama'];
	$tempat=$_POST['tempat'];
	$tanggal_kegiatan =$_POST['tgl_kegiatan'];
	$tanggal_kegiatan2 =$_POST['tgl_kegiatan2'];
$file_tmp =  $_FILES['file']['tmp_name'];
$file_type = $_FILES['file']['type'];
$file_lama = $_POST['file_lama'];
if($file_tmp==''){  #kondisi A
		if($file_lama==''){  #A1
			$nama_file = '';
		}
	else{  #A2
			if($file_lama==$keg."_".$tgl."_".$kd.'.jpg'){
				$format = ".jpg";
			}
			
			else{
				$format = ".png";
			}
			$nama_file =$nama."_".$tanggal_kegiatan."_".$kd.$format;
			$tempat_file_baru = "kegiatan/".$nama_file;
			$tempat_file_lama = "kegiatan/".$file_lama;
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
			echo "<a href='?module=data_kegiatan&act=edit_kegiatan&id=$id'>
					Kembali</a>";
			exit;
		}
		$nama_file = $nama."_".$tanggal_kegiatan."_".$kd.$format;
		$tempat_file_baru = "kegiatan/".$nama_file;
		$tempat_file_lama = "kegiatan/".$file_lama;
		
		if($file_lama==''){
			copy($file_tmp,$tempat_file_baru);
		}
		else{
			unlink($tempat_file_lama);
			copy($file_tmp,$tempat_file_baru);
		}
	}

	mysql_query("update kegiatan set nama_kegiatan='$nama',tempat='$tempat',tanggal_mulai='$tanggal_kegiatan',tanggal_selesai='$tanggal_kegiatan2',photo='$nama_file' where id='$id'");

echo"<script language='javascript'>alert('DATA TERSIMPAN');window.location ='../master.php?module=data_kegiatan';</script>";


}


break;
case"hapus_kegiatan":
$sql=mysql_query("select * from kegiatan where id='$_GET[id]'");
$ada=mysql_fetch_array($sql);
$hapus_file="kegiatan/".$ada['photo'];
if($ada>0){
unlink($hapus_file);	
}
mysql_query("DELETE FROM kegiatan WHERE id = '$_GET[id]'");
mysql_query("DELETE FROM kepanitiaan WHERE id = '$_GET[id]'");
//mysql_query("DELETE id FROM subkegiatan WHERE id = '$_GET[id]'");
/*mysql_query("DELETE id FROM kepanitiaan WHERE id = '$_GET[id]'");
mysql_query("DELETE id FROM rapat WHERE id = '$_GET[id]'");

mysql_query("DELETE id FROM proposal WHERE id = '$_GET[id]'");
mysql_query("DELETE id FROM surat WHERE id = '$_GET[id]'");*/
	echo"<script language='javascript'>window.location ='../master.php?module=data_kegiatan'</script>";
break;
}
?>