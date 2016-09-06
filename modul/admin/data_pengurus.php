<br>
<?php
	include "fungsi/class_paging.php";
	$ukm=$_GET['kd'];
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM anggota where kd_ukm='$ukm'"));
?>
<h2><span>Informasi Anggota, Total: <?php echo $Num_Rows; ?> Anggota</span></h2>

	<div class="module-table-body">
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
									
                                    <th style="width:20%">Tempat Lahir</th>
                                    <th style="width:20%">Tanggal Lahir</th>
									<th style="width:20%">Angkatan</th>
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
										
                                        <td><?php echo $data['tempat_lahir']; ?></td>
                                        <td><?php echo $data['tanggal_lahir']; ?></td>
                                        <td><?php echo $data['angkatan']; ?></td>
                                       
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