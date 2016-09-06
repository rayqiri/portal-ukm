<br>
<?php
	include "fungsi/class_paging.php";
	$fak=$_SESSION['fakultas'];
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM kegiatan,ukm,akun where ukm.kd_ukm=kegiatan.kd_ukm and ukm.kd_ukm=akun.kd_ukm and ukm
	.fakultas='$fak'"));
?>
<form method="post" action="">
<table>
<tr>
            <td>Tanggal Kegiatan :</td><td><select name="bln" size="1">
    <option value=""></option>            
	<option value='01'>JANUARI</option>
    <option value='02'>FEBRUARI</option>
    <option value='03'>MARET</option>
    <option value='04'>APRIL</option>
    <option value='05'>MEI</option>
    <option value='06'>JUNI</option>
    <option value='07'>JULI</option>
    <option value='08'>AGUSTUS</option>
    <option value='09'>SEPTEMBER</option>
    <option value='10'>OKTOBER</option>
    <option value='11'>NOVEMBER</option>
    <option value='12'>DESEMBER</option>
    </select>
              </select></td><td>
  <select name="thn" size="1" id="thn">
  <option value=""></option>
                <?php
		     for ($i=2015;$i<=2025;$i++)
			 { 
			   echo "<option value=".$i.">".$i."</option>";
			 }
		  ?>
              </select></td>             
        <td>
<input name='ok' type='submit' value='LIHAT'>
</td>
</tr>
</table>
</form>
<h2><span>Informasi Kegiatan UKM</span></h2>
							<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:20%">Nama Kegiatan</th>
                                    <th style="width:20%">Ketua Kegiatan</th>
									<th style="width:20%">Tempat Kegiatan</th>
                                    <th style="width:20%">Tanggal Mulai</th>
                                    <th style="width:20%">Tanggal Selesai</th>
                                    <th style="width:20%">Laporan Keuangan</th>
								</tr>
                                <?php
								if (isset($_POST['ok'])){
								$tanggal=$_POST['thn']."-".$_POST['bln'];								
								$sql = mysql_query("SELECT * FROM kegiatan,kepanitiaan,ukm where ukm.kd_ukm=kegiatan.kd_ukm and ukm.fakultas='$fak' and kegiatan.id=kepanitiaan.id and left(kegiatan.tanggal_mulai,7)='$tanggal' ORDER BY kegiatan.id ASC ");
								$no = 1;
								while ($data = mysql_fetch_array($sql)){
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama_kegiatan']; ?></td>
                                        <td><?php echo $data['ketua']; ?></td>
										<td><?php echo $data['tempat']; ?></td>
                                        <td><?php echo tgl_indo(date($data['tanggal_mulai']));?></td>
                                        <td><?php echo tgl_indo(date($data['tanggal_selesai']));?></td>
                                        <td><a href='?module=keuangan&id=<?php echo"$data[id]";?>'>Lihat Selengkapnya</a></td>
									</tr>
									<?php
									$no++;
								}
								
								?>
				</table>
			<?php
								}else{
									$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);								
								$sql2 = mysql_query("SELECT * FROM kegiatan,kepanitiaan,ukm where ukm.kd_ukm=kegiatan.kd_ukm and ukm.fakultas='$fak' and kegiatan.id=kepanitiaan.id ORDER BY kegiatan.id ASC LIMIT $posisi,$batas");
								$no2 = $posisi+1;
								while ($data2 = mysql_fetch_array($sql2)){
									?>
                                    <tr>
										<td><?php echo $no2; ?></td>
										<td><?php echo $data2['nama_kegiatan']; ?></td>
                                        <td><?php echo $data2['ketua']; ?></td>
										<td><?php echo $data2['tempat']; ?></td>
                                        <td><?php echo tgl_indo(date($data2['tanggal_mulai']));?></td>
                                        <td><?php echo tgl_indo(date($data2['tanggal_selesai']));?></td>
                                        <td><a href='?module=keuangan&id=<?php echo $data2['id'];?>'>Lihat Selengkapnya</a></td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM kegiatan,ukm,akun where ukm.kd_ukm=kegiatan.kd_ukm and ukm.kd_ukm=akun.kd_ukm and akun.fakultas='$fak'"));
							$jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

							echo "<div id='paging'>Hal: $linkHalaman </div>";
							?>
						</td>
					</tr>
				</table>
			<div style="clear: both"></div>
			<?php
								}
			?>
                                        
</body>
</html>
