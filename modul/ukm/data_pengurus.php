<br>
<?php
switch($_GET['act']){
	default:
	include "fungsi/class_paging.php";
	$ukm=$_SESSION['ukm'];
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM anggota where kd_ukm='$ukm'"));
?>
<h2><span>Informasi Anggota, Total: <?php echo $Num_Rows; ?> Anggota</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah Pengurus' onclick=\"window.location.href='?module=input_anggota';\">";?></th>
                </tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:20%">NIM</th>
									<th style="width:20%">Nama Lengkap</th>
									<th style="width:20%">Alamat</th>
									<th style="width:20%">Kota</th>
                                    <th style="width:20%">Provinsi</th>
									<th style="width:20%">No Telp</th>
                                    <th style="width:20%">Agama</th>
									<th style="width:20%">Email</th>
                                    <th style="width:20%">Tempat Lahir</th>
                                    <th style="width:20%">Tanggal Lahir</th>
									<th style="width:20%">Angkatan</th>
                                    <th style="width:15%">Aksi</th>
								</tr>
                                <?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM mahasiswa,anggota,kota,provinsi where mahasiswa.nim=anggota.nim and mahasiswa.kd_kota=kota.kd_kota and mahasiswa.kd_provinsi=provinsi.kd_provinsi and anggota.kd_ukm='$ukm' ORDER BY mahasiswa.nim ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nim']; ?></td>
										<td><?php echo $data['nama']; ?></td>
										<td><?php echo $data['alamat']; ?></td>
										<td><?php echo $data['kota']; ?></td>
                                        <td><?php echo $data['provinsi']; ?></td>
                                        <td><?php echo $data['telp']; ?></td>
										<td><?php echo $data['agama']; ?></td>
										<td><?php echo $data['email']; ?></td>
                                        <td><?php echo $data['tempat_lahir']; ?></td>
                                        <td><?php echo $data['tanggal_lahir']; ?></td>
                                        <td><?php echo $data['angkatan']; ?></td>
                                        <td><a href="?module=data_pengurus&act=edit_pengurus&id=<?php echo $data['nim'];?>">Edit</a> | <a href="?module=data_pengurus&act=hapus_pengurus&id=<?php echo $data['nim'];?>" onClick="return confirm('Anda yakin ingin menghapus Mahasiswa <?php echo $data['nama']; ?>?');">Hapus</a> </td>
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
<td colspan=13><a href="modul/ukm/cetak_pengurus.php"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a>
</td></tr>
				</table>
			
				<table>
					<tr>
						<td>
							<?php
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM anggota where kd_ukm='$ukm'"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET[halaman], $jmlhalaman);

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
case"edit_pengurus";
$cek = mysql_fetch_array(mysql_query("SELECT * FROM mahasiswa WHERE nim='$_GET[id]'"));
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
        <script>    
	$(function(){
    $('#lsKode')
    .change(function(){
    var kode = $(this).val();
	$('#alpha').slideUp('normal');
    $('#alpha').slideDown('normal').load('modul/ukm/ajax_progdi.php',{ kode: kode});
    })
    .change();
    });
    </script>
    
<script>    
	$(function(){
    $('#prov')
    .change(function(){
    var kode = $(this).val();
	$('#alpha2').slideUp('normal');
    $('#alpha2').slideDown('normal').load('modul/ukm/ajax_kota.php',{ kode: kode});
    })
    .change();
    });
    </script>
		</head>
		<body>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td height="50" colspan="3">
			<center>EDIT DATA PENGURUS</center>
		</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input name='nama' type='text' size='30' <?php echo"value='$cek[nama]'";?>>
		</td>
	</tr>
    
            <td>Telp</td>
            <td>:</td>
            <td><input name='telp' type='text' size='30' <?php echo"value='$cek[telp]'";?>></td>
    </tr>
    <tr>
            <td>E-Mail</td>
            <td>:</td>
            <td><input name='email' type='text' size='30' <?php echo"value='$cek[email]'";?>></td>
    </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td><input name='tempat_lahir' type='text' size='30' <?php echo"value='$cek[tempat_lahir]'";?>></td>
    </tr>
    <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><input type="text"  name="tgl_lahir" id="tanggal"/ <?php echo"value='$cek[tanggal_lahir]'";?>></td>
          </tr>
          <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name='alamat' cols="20" rows="2" <?=$a?>><?php echo"$cek[alamat]";?></textarea></td>
    </tr>
    <tr>
		<td>Provinsi & Kota</td>
		<td>:</td>
		<td>
			<select name='provinsi' id='prov' >>
				<option>---Pilih Provinsi---</option>
                <?php
				$e=mysql_query("select * from provinsi");
				while($f=mysql_fetch_array($e)){
					$cek3=$cek['provinsi'];
				echo"<option value='$f[kd_provinsi]$cek3'";if($cek['kd_provinsi']=="$f[kd_provinsi]"){ echo"selected";}echo">$f[provinsi]</option>";	
				}
				?>
			</select>
            <p id="alpha2">
		</td>
	</tr>
    <tr>
		<td>Agama</td>
		<td>:</td>
		<td>
			<select name='agama' <?=$a?>>
				<option></option>
				<option value='ISLAM'<?php if($cek['agama']=="ISLAM"){echo"selected";} ?>>ISLAM</option>
				<option value='KRISTEN'<?php if($cek['agama']=="KRISTEN"){echo"selected";}?>>KRISTEN</option>
				<option value='KATHOLIK'<?php if($cek['agama']=="KATHOLIK"){echo"selected";} ?>>KATHOLIK</option>
				<option value='HINDU'<?php if($cek['agama']=="HINDU"){echo"selected";} ?>>HINDU</option>
                <option value='BUDHA'<?php if($cek['agama']=="BUDHA"){echo"selected";} ?>>BUDHA</option>
	</select>
		</td>
	</tr>
    <tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
		<select name='jns_kelamin' <?=$a?>>
				<option></option>
				<option value='L'<?php if($cek['jns_kelamin']=="L"){echo"selected";} ?>>Laki-laki</option>
				<option value='P'<?php if($cek['jns_kelamin']=="P"){echo"selected";} ?>>Perempuan</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Fakultas & Progdi</td>
		<td>:</td>
		<td>
		<select name='fakultas' id='lsKode' <?=$a?>>
				<option>---Pilih Fakultas---</option>
                <?php
				$c=mysql_query("select * from fakultas");
				while($d=mysql_fetch_array($c)){
					$cek2=$cek['progdi'];
				echo"<option value='$d[kd_fakultas]$cek2'";if($cek['fakultas']=="$d[kd_fakultas]"){ echo"selected";}echo">$d[fakultas]</option>";	
				}
				?>
			</select>
            <p id="alpha">
		</td>
          
        
	</tr>	
    <tr>
            <td>Photo</td>
            <td>:</td>
            <td><img src="<?php echo"photo/".$cek['photo'];?>" height="100" width="80"><br><input name='gambar' type='file'> File Gambar Max Size 2MB</td>
    </tr>
	<tr>
		<td colspan='2'></td>
		<td>
        	<input type="hidden" name="gambar_lama" value="<?php echo"$cek[photo]";?>">
        	<input type="hidden" name="kd" value="<?php echo"$cek[nim]";?>">
			<input name='simpan' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Back' onclick='javascript.history.back()'>";?>
		</td>
	</tr>
</table>
</form>
    </body>
</html>

<?php
if(isset($_POST['simpan']))
{
	$kd=$_POST['kd'];
	$nama=$_POST['nama'];
	$alamat=$_POST['alamat'];
	$kota=$_POST['kota'];
	$provinsi=$_POST['provinsi'];
	$telp=$_POST['telp'];
	$email=$_POST['email'];
	$tempat_lahir=$_POST['tempat_lahir'];
	$tanggal_lahir =$_POST['tgl_lahir'];
	$agama=$_POST['agama'];
	$jns_kelamin=$_POST['jns_kelamin'];
	$angkatan=substr($kd,0,4);
	$fakultas=substr($_POST['fakultas'],0,1);
	$progdi=$_POST['progdi'];
if ((empty($nama)) or (empty($alamat)) or (empty($kota)) or (empty($telp)) or (empty($email)) or (empty($tempat_lahir)) or (empty($tanggal_lahir)) or (empty($agama)) or (empty($jns_kelamin)) or (empty($fakultas)) or (empty($progdi)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
}else{ 
$foto_tmp =  $_FILES['gambar']['tmp_name'];
$foto_type = $_FILES['gambar']['type'];
$foto_lama = $_POST['gambar_lama'];
$file_size	=$_FILES['file']['size'];
	if($foto_tmp==''){  #kondisi A
		if($foto_lama==''){  #A1
			$nama_foto = '';
		}
	else{  #A2
			if($foto_lama=='img_'.$kd.'.jpg'){
				$format = ".jpg";
			}
			else{
				$format = ".png";
			}
			$nama_foto = "img_".$kd.$format;
			$tempat_foto_baru = "photo/".$nama_foto;
			$tempat_foto_lama = "photo/".$foto_lama;
			rename($tempat_foto_lama,$tempat_foto_baru);
		}
	}
	else{  #kondisi B
		if($foto_type=="image/jpeg"){	
			$format = ".jpg";
		}
		else if($foto_type=="image/png"){
			$format = ".png";
		}
		else{	
			#ditolak
			
			echo "File foto tidak sesuai format<br>";
			echo "<a href='?module=data_pengurus&act=edit_pengurus&id=$kd'>
					Kembali</a>";
			exit;
		}
		$nama_foto = "img_".$kd.$format;
		$tempat_foto_baru = "photo/".$nama_foto;
		$tempat_foto_lama = "photo/".$foto_lama;
		$maxsize=2000000;
	if ($file_size>$maxsize){
		echo "Ukuran foto Terlalu Besar<br>";
			echo "<a href='?module=data_pengurus&act=edit_pengurus&id=$kd'>
					Kembali</a>";
			exit;
	}else{
		if($foto_lama==''){
			copy($foto_tmp,$tempat_foto_baru);
		}
		else{
			unlink($tempat_foto_lama);
			copy($foto_tmp,$tempat_foto_baru);
		}
	}
	}
	mysql_query("UPDATE mahasiswa SET nama='$nama',alamat='$alamat',kd_provinsi='$provinsi',kd_kota='$kota',telp='$telp',agama='$agama',email='$email',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',jns_kelamin='$jns_kelamin',angkatan='$angkatan',fakultas='$fakultas',progdi='$progdi',photo='$nama_foto' WHERE nim='$kd'");
echo"<script language='javascript'>alert('DATA TERSIMPAN');window.location ='../master.php?module=data_pengurus'</script>";


}
}

break;
case"hapus_pengurus":
mysql_query("DELETE FROM anggota WHERE nim = '$_GET[id]' and kd_ukm='$_SESSION[ukm]'");
	echo"<script language='javascript'>window.location ='../master.php?module=data_pengurus'</script>";
break;
}
?>