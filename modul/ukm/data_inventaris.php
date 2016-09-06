<?php
switch($_GET['act']){
	default:
	include "fungsi/class_paging.php";
	$ukm=$_SESSION['ukm'];
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM inventaris where kd_ukm='$ukm'"));
?>
<h2><span>Informasi Inventaris, Total Data: <?php echo $Num_Rows; ?> </span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah Inventaris' onclick=\"window.location.href='?module=inventaris';\">";?></th>
                </tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th style="width:5%">No</th>
									
									<th style="width:21%">Nama Barang</th>
									<th style="width:21%">Jumlah Barang</th>
									<th style="width:21%">Kondisi</th>
                                    <th style="width:21%">Status</th>
                                    <th style="width:21%">Aksi</th>
								</tr>
                                <?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * from inventaris where kd_ukm='$ukm' ORDER BY kd_inventaris ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama_barang']; ?></td>
										<td><?php echo $data['jumlah_barang']; ?></td>
										<td><?php echo $data['kondisi']; ?></td>
                                        <td><?php echo $data['status']; ?></td>
                                        <td><a href="?module=data_inventaris&act=edit_inventaris&id=<?php echo $data['kd_inventaris'];?>">Edit</a> | <a href="?module=data_inventaris&act=hapus_inventaris&id=<?php echo $data['kd_inventaris']; ?>" onclick="return confirm('Anda yakin ingin menghapus <?php echo $data['nama_barang']; ?>?');">Hapus</a> </td>
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
<td colspan=13><a href="modul/ukm/cetak_inventaris.php"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a>
</td></tr>
				</table>
			
				<table>
					<tr>
						<td>
							<?php
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM inventaris where kd_ukm='$ukm'"));
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

case"edit_inventaris":
$data = mysql_fetch_array(mysql_query("SELECT * FROM inventaris WHERE kd_inventaris='$_GET[id]' and kd_ukm='$_SESSION[ukm]'"));
?>
<form method='POST' action=''>
<h1><center>INVENTARIS HMJ TI UMK</center></h1>
<table>
    <tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td>
			<input name='nama' type='text' size='30' id='cari' <?php echo"value='$data[nama_barang]'";?>>
		</td>
	</tr>
    <tr>
		<td>Jumlah Barang</td>
		<td>:</td>
		<td>
			<input name='jumlah' type='text' size='30' id='cari' <?php echo"value='$data[jumlah_barang]'";?>>
		</td>
	</tr>
    <tr>
		<td>Kondisi</td>
		<td>:</td>
		<td>
			<input name='kondisi' type='text' size='30' id='cari' <?php echo"value='$data[kondisi]'";?>>
		</td>
	</tr>
    <tr>
		<td colspan='2'></td>
		<td>
        	<input type='hidden' name='id' <?php echo"value='$data[kd_inventaris]'";?>>
			<input name='simpan' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Back' onclick='javascript.history.back()'>";?>
		</td>
	</tr>
    </table>
    </form>
<?php
if(isset($_POST['simpan']))
{
	$id=$_POST['id'];
	$nama=$_POST['nama'];
	$jumlah=$_POST['jumlah'];
	$kondisi=$_POST['kondisi'];
	$date=date('Y-m-d H:i:s');
if ((empty($nama)) or (empty($jumlah)) or (empty($kondisi))){
?> <script language='javascript'>alert('ISIKAN KOLOM YANG DISEDIAKAN!!!')</script><?	
}	else{
		mysql_query("update inventaris set nama_barang='$nama',jumlah_barang='$jumlah',kondisi='$kondisi' where kd_inventaris='$id'");
		?>
	<script>
		alert('Data Tersimpan');window.location ='../master.php?module=data_inventaris';
	</script>
<?php
}
}

break;
case"hapus_inventaris":
mysql_query("DELETE FROM inventaris WHERE kd_inventaris='$_GET[id]'");
mysql_query("DELETE FROM pinjam WHERE kd_inventaris='$_GET[id]'");
	echo"<script language='javascript'>window.location ='../master.php?module=data_inventaris'</script>";
break;

}
?>