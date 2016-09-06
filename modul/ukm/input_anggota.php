
<html>
<head>
        <title>INPUT DATA MAHASISWA</title>
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
        <form method='POST' action='' enctype="multipart/form-data">
         
        <table>
	<tr>
		<td>Masukan NIM</td>
		<td>:</td>
		<td>
			<input name='nim2' type='text' size='30' id='cari'>
		
			<input name='cek' type='submit' value='CEK'>*Mengecek Data Mahasiswa di Database
		</td>
	</tr>
    </table>
    </form>
    <?php
if(isset($_POST['cek'])){
$nim2=$_POST['nim2'];
$sql=mysql_query("select * from mahasiswa where nim='$nim2'");
$cek=mysql_fetch_array($sql);
if($cek>0){ $a="disabled";	}else{$a="enabled";echo"<script language='javascript'>alert('Data Belum Ada di Database Silahkan Input Data Pada Kolom yang Disediakan');</script>";}
}
	?>
    <h1><center>INPUT DATA ANGGOTA</center></h1>
    <form method="post" action='' enctype="multipart/form-data">
        <table>
    <tr>
		<td>Nim</td>
		<td>:</td>
		<td>
			<input name='nim' type='text' size='30' <?php echo"value='$cek[nim]'";?>>
		</td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input name='nama' type='text' size='30' <?php echo"value='$cek[nama]' $a";?>>
		</td>
	</tr>
    
            <td>Telp</td>
            <td>:</td>
            <td><input name='telp' type='text' size='30' <?php echo"value='$cek[telp]' $a";?>></td>
    </tr>
    <tr>
            <td>E-Mail</td>
            <td>:</td>
            <td><input name='email' type='text' size='30' <?php echo"value='$cek[email]' $a";?>></td>
    </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td><input name='tempat_lahir' type='text' size='30' <?php echo"value='$cek[tempat_lahir]' $a";?>></td>
    </tr>
    <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><input type="text"  name="tgl_lahir" id="tanggal"/ <?php echo"value='$cek[tanggal_lahir]' $a";?>></td>
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
			<select name='provinsi' id='prov' <?=$a?>>
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
            <td><img src="<?php echo"photo/".$cek['photo'];?>" height="100" width="80"><br><input name='file' type='file' <?=$a?>>File Gambar Max size 2MB</td>
    </tr>
	<tr>
		<td colspan='2'></td>
		<td>
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
	$nim=$_POST['nim'];
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
	$angkatan=substr($nim,0,4);
	$fakultas=substr($_POST['fakultas'],0,1);
	$progdi=$_POST['progdi'];
	$ukm=$_SESSION['ukm'];
$sql=mysql_query("select nim from mahasiswa where nim='$nim'");
$ada=mysql_fetch_array($sql);
$sql2=mysql_query("select * from anggota where nim='$nim' and kd_ukm='$ukm'");
$ada2=mysql_fetch_array($sql2);
if ($ada2>0){
	echo"<script language='javascript'>alert('Mahasiswa dengan NIM $nim Sudah Terdaftar Sebagai Anggota!!!')</script>";}
elseif ($nim==$ada['nim']){
	$nim3=$_POST['nim'];
	mysql_query("insert into anggota(kd_anggota,nim,kd_ukm)values('null','$nim','$ukm')");
echo"<script language='javascript'>alert('DATA TERSIMPAN');window.location ='../ukm/master.php?module=data_pengurus'</script>";
}else{
if ((empty($nim)) or (empty($nama)) or (empty($alamat)) or (empty($kota)) or (empty($telp)) or (empty($email)) or (empty($tempat_lahir)) or (empty($tanggal_lahir)) or (empty($agama)) or (empty($jns_kelamin)) or (empty($fakultas)) or (empty($progdi)))
{	
	?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?
}else{ 
	
	
$foto		=$_FILES['file']['tmp_name'];
$foto_type	=$_FILES['file']['type'];
$file_size	=$_FILES['file']['size'];

	if (!$foto){
		echo "File foto belum ada<br>";
		echo "<a href='?module=input_anggota'>Kembali</a>";
		exit;
	}
	else{
		if ($foto_type=="image/png"){
			$nama_foto_baru	="img_".$nim.".png";
		}
		else if($foto_type=="image/jpeg"){
			$nama_foto_baru	="img_".$nim.".jpg";
		}
		else{
			echo "Format foto tdk mendukung<br>";
			echo "<a href='?module=input_anggota'>Kembali</a>";
			exit;
		}
	}
	$maxsize=2000000;
	if ($file_size>$maxsize){
		echo "Ukuran foto Terlalu Besar<br>";
			echo "<a href='?module=input_anggota'>Kembali</a>";
			exit;
	}else{
	$tujuan			="photo/".$nama_foto_baru;
	copy($foto,$tujuan);
	mysql_query("insert into mahasiswa(nim,nama,alamat,kd_provinsi,kd_kota,telp,agama,email,tempat_lahir,tanggal_lahir,jns_kelamin,angkatan,fakultas,progdi,photo) values('$nim','$nama','$alamat','$provinsi','$kota','$telp','$agama','$email','$tempat_lahir','$tanggal_lahir','$jns_kelamin','$angkatan','$fakultas','$progdi','$nama_foto_baru')");
	mysql_query("insert into anggota(kd_anggota,nim,kd_ukm)values('null','$nim','$ukm')");
echo"<script language='javascript'>alert('DATA TERSIMPAN');window.location ='../../master.php?module=data_pengurus'</script>";
	}
}
}
}
?>
