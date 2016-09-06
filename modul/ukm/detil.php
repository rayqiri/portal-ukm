<?php
extract ($_GET); 
extract ($_POST);

	$nim=$_POST['nim'];

	$query = "SELECT * FROM mahasiswa where nim='$nim'";
	$sql = mysql_query ($query);
	$data = mysql_fetch_array ($sql);
	if($data>0){
	?>
<form method='post' action=''>
<table>
	<tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input name="nama" type="text" size="30" id="cari2" <?php echo"value='$data[nama]'";?> disabled>
		</td>
	</tr>
    <tr>
		<td>Alamat</td>
		<td>:</td>
		<td>
			<textarea name='alamat' cols="20" rows="2" disabled><?php echo"$data[alamat]";?></textarea>
		</td>
	</tr>
     <tr>
		<td>Kota</td>
		<td>:</td>
		<td>
			<input name="kota" type="text" size="30" id="cari7" <?php echo"value='$data[kota]'";?> disabled>
		</td>
	</tr>
    <tr>
            <td>Telp</td>
            <td>:</td>
            <td><input name="telp" type="text" size="30" id='cari8' <?php echo"value='$data[telp]'";?>disabled></td>
    </tr>
    <tr>
            <td>E-Mail</td>
            <td>:</td>
            <td><input name="email" type="text" size="30" id="cari10" <?php echo"value='$data[email]'";?>disabled></td>
    </tr>
    <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td><input name="tempat_lahir" type="text" size="30" id="cari3" <?php echo"value='$data[tempat_lahir]'";?>disabled></td>
    </tr>
    <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><input type="text"  name="tgl_lahir" id="tanggal" <?php echo"value='$data[tanggal_lahir]'";?>disabled/></td>
    </tr>
    <tr>
		<td>Agama</td>
		<td>:</td>
		<td>
			<select name="agama" id="cari9" <?php echo"value='$data[agama]'";?>disabled>
				<option></option>
				<option value="ISLAM">ISLAM</option>
				<option value="KRISTEN">KRISTEN</option>
				<option value="KATHOLIK">KATHOLIK</option>
				<option value="HINDU">HINDU</option>
                <option value="BUDHA">BUDHA</option>
	</select>
		</td>
	</tr>
    <tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
		<select name="jns_kelamin" id="cari4" <?php echo"value='$data[jns_kelamin]'";?>>
				<option></option>
				<option value="L">Laki-laki</option>
				<option value="P">Perempuan</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Fakultas</td>
		<td>:</td>
		<td>
		<select name='fakultas'>
				<option>---Pilih Fakultas---</option>
				<option value='ekonomi'>Ekonomi</option>
				<option value='teknik'>Teknik</option>
				<option value='fkip'>FKIP</option>
				<option value='hukum'>Hukum</option>
                <option value='pertanian'>Pertanian</option>
			</select>
		</td>
	</tr>	
    <tr>
		<td>Progdi</td>
		<td>:</td>
		<td>
		<select name='progdi'>
				<option>---Pilih Progdi---</option>
                <?php
				$sql=mysql_query("select * from progdi");
				while($data=mysql_fetch_array($sql)){
					echo"
				<option value='$data[kd_progdi]'>$data[progdi]</option>";}?>
			</select>
		</td>
	</tr>	
    <tr>
		<td colspan="2"></td>
		<td>
		<input type='hidden' name='id' <?php echo"value='$data[nim]'";?>>
			<input name='simpan' type='submit' value='Simpan'>
			<input type="reset" name="reset" value="Batal"/>
			<?php echo"<input type='button' value='Kembali' onclick=\"window.location.href='?module=data_pengurus';\">";?>
		</td>
	</tr>
		</table>
        </form>
            <?
	}else{

	?>
    <form metho='post' action=''>
    <table>
    <tr>
		<td>Nama</td>
		<td>:</td>
		<td>
			<input name='nama' type='text' size='30' id='cari2'>
		</td>
	</tr>
    <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name='alamat' cols="20" rows="2"></textarea></td>
    </tr>
    <tr>
		<td>Kota</td>
		<td>:</td>
		<td>
			<input name='kota' type='text' size='30' id='cari7'>
		</td>
	</tr>
    <tr>
            <td>Telp</td>
            <td>:</td>
            <td><input name='telp' type='text' size='30' id='cari8'></td>
    </tr>
    <tr>
            <td>E-Mail</td>
            <td>:</td>
            <td><input name='email' type='text' size='30' id='cari10'></td>
    </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td><input name='tempat_lahir' type='text' size='30' id='cari3'></td>
    </tr>
    <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td><input type="text"  name="tgl_lahir" id="tanggal"/></td>
          </tr>
		<td>Agama</td>
		<td>:</td>
		<td>
			<select name='agama' id='cari9'>
				<option></option>
				<option value='ISLAM'>ISLAM</option>
				<option value='KRISTEN'>KRISTEN</option>
				<option value='KATHOLIK'>KATHOLIK</option>
				<option value='HINDU'>HINDU</option>
                <option value='BUDHA'>BUDHA</option>
	</select>
		</td>
	</tr>
    <tr>
		<td>Jenis Kelamin</td>
		<td>:</td>
		<td>
		<select name='jns_kelamin' id='cari4'>
				<option></option>
				<option value='L'>Laki-laki</option>
				<option value='P'>Perempuan</option>
			</select>
		</td>
	</tr>
	<tr>
		<td>Fakultas</td>
		<td>:</td>
		<td>
		<select name='fakultas'>
				<option>---Pilih Fakultas---</option>
				<option value='ekonomi'>Ekonomi</option>
				<option value='teknik'>Teknik</option>
				<option value='fkip'>FKIP</option>
				<option value='hukum'>Hukum</option>
                <option value='pertanian'>Pertanian</option>
			</select>
		</td>
	</tr>	
    <tr>
		<td>Progdi</td>
		<td>:</td>
		<td>
		<select name='progdi'>
				<option>---Pilih Progdi---</option>
                <?php
				$sql=mysql_query("select * from progdi");
				while($data=mysql_fetch_array($sql)){
					echo"
				<option value='$data[nm_progdi]'>$data[nm_progdi]</option>";}?>
			</select>
		</td>
	</tr>	
    <tr>
            <td>Photo</td>
            <td>:</td>
            <td><input name='gambar' type='file'></td>
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
	</FORM>
    <?php
}
	?>
    

</div>