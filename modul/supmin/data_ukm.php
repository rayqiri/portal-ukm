<br>
<?php
switch($_GET['act']){
	default:
	
	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM ukm"));
?>
<h2><span>Informasi UKM, Total: <?php echo $Num_Rows; ?> UKM</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah UKM' onclick=\"window.location.href='?module=ukm';\">";?></th>
                </tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:20%">Nama UKM</th>
                                    <th style="width:20%">Nama Singkatan</th>
									<th style="width:20%">Logo</th>
                                    <th style="width:15%">Edit</th>
                                    <th style="width:15%">Hapus</th>
								</tr>
                                <?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM ukm ORDER BY kd_ukm ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama_full']; ?></td>
                                        <td><?php echo $data['nama_ukm']; ?></td>
                                        <td><img src="ukm/<?php echo $data['logo'];?>" width="80" height="50" /></td>
                                        <td><a href="?module=data_ukm&act=edit_ukm&id=<?php echo $data['kd_ukm'];?>">Edit</a></td><td> <a href="?module=data_ukm&act=hapus_ukm&id=<?php echo $data['kd_ukm'];?>" onClick="return confirm('Anda yakin ingin menghapus UKM <?php echo $data['nama_ukm']; ?>?');">Hapus</a> </td>
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
				</table>
			
				<table>
					<tr>
						<td>
							<?php
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM ukm"));
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
case"edit_ukm":
$data = mysql_fetch_array(mysql_query("SELECT * FROM ukm where kd_ukm='$_GET[id]'"));
	?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Input Ukm</title>
</head>

<body>
<h1><center>EDIT UKM</center></h1>
<form method="post" action="" enctype="multipart/form-data">
<table>
<tr>
	<td>Nama UKM</td>
    <td>:</td>
    <td><input name="nama" type="text" size="40" <?php echo"value='$data[nama_full]'";?>/>
   </td>
</tr>
<tr>
	<td>Nama Singkatan UKM</td>
    <td>:</td>
    <td><input name="singkatan" type="text" size="20" <?php echo"value='$data[nama_ukm]'";?>/>
   </td>
</tr>
<tr>
	<td>Fakultas</td>
    <td>:</td>
    <td><select name="fakultas">
    <option value='0'<?php if($data['fakultas']=="0"){echo"selected";}?>>TIdak Ada</option>
    <?php
	$a=mysql_query("select * from fakultas");
	while ($b=mysql_fetch_array($a)){
	echo"<option value='$b[kd_fakultas]'";if($data['fakultas']=="$b[kd_fakultas]"){echo"selected";}echo">$b[fakultas]</option>";	
	}
	?>
    </select>
    Untuk UKM Lingkup Universitas Pilih Tidak Ada
   </td>
</tr>
<tr>
	<td>Logo</td>
    <td>:</td>
    <td><img src="ukm/<?php echo $data['logo'];?>" width="80" height="100" /><br /><input name="file" type="file" />Max size 2 MB
   </td>
</tr> 
<tr>
	<td colspan="3" align="center">
    <input type='hidden' name='kd' <?php echo"value='$data[kd_ukm]'";?>>
    <input type='hidden' name='file_lama' <?php echo"value='$data[logo]'";?> />
    <input type='hidden' name='ukm' <?php echo"value='$data[nama_ukm]'";?> />
    <input name="simpan" type="submit" value="Simpan" />
    <input type='reset' name='reset' value='Batal'>
            </td>
</tr>    
</table>
</form>
<?php
if (isset($_POST['simpan'])){
$nama=$_POST['nama'];
$singkatan=$_POST['singkatan'];
$fakultas=$_POST['fakultas'];
$id=$_POST['kd'];
$ukm=$_POST['ukm'];
if ((empty($nama)) or (empty($singkatan)))
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
			if($file_lama==$ukm.'.jpg'){
				$format = ".jpg";
			}
			
			else{
				$format = ".png";
			}
			$nama_file =$singkatan.$format;
			$tempat_file_baru = "ukm/".$nama_file;
			$tempat_file_lama = "ukm/".$file_lama;
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
			echo "<a href='?module=data_ukm&act=edit_ukm&id=$id'>
					Kembali</a>";
			exit;
		}
		$nama_file = $singkatan.$format;
		$tempat_file_baru = "ukm/".$nama_file;
		$tempat_file_lama = "ukm/".$file_lama;
		$maxsize=2000000;
	if ($file_size>$maxsize){
		echo "Ukuran logo Terlalu Besar<br>";
			echo "<a href='?module=data_ukm&act=edit_ukm&id=$id'>
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
	mysql_query("UPDATE ukm SET nama_ukm='$singkatan',nama_full='$nama',fakultas='$fakultas',logo='$nama_file' where kd_ukm='$id'");
	
	?><script language="javascript">alert("DATA TERSIMPAN!!!");window.location ='../master.php?module=data_ukm';</script><?php
}
}
?>
  
</body>
</html>
<?php

break;
case"hapus_ukm":
$sql=mysql_query("select * from ukm where id='$_GET[id]'");
$ada=mysql_fetch_array($sql);
$hapus_file="ukm/".$ada['logo'];
if($ada>0){
unlink($hapus_file);	
}
mysql_query("DELETE FROM ukm WHERE kd_ukn = '$_GET[id]'");
//mysql_query("DELETE id FROM subkegiatan WHERE id = '$_GET[id]'");
/*mysql_query("DELETE id FROM kepanitiaan WHERE id = '$_GET[id]'");
mysql_query("DELETE id FROM rapat WHERE id = '$_GET[id]'");

mysql_query("DELETE id FROM proposal WHERE id = '$_GET[id]'");
mysql_query("DELETE id FROM surat WHERE id = '$_GET[id]'");*/
	echo"<script language='javascript'>window.location ='../master.php?module=data_ukm'</script>";
break;
}
?>