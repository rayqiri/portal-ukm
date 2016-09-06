<?php
	include "fungsi/class_paging.php";
	$fak=$_SESSION['fakultas'];
	$Num_Rows = mysql_num_rows(mysql_query("select * from ukm where fakultas='$fak'"));
?>
<h2><span>Informasi Unit Kegiatan Mahasiswa, Total UKM: <?php echo $Num_Rows; ?> </span></h2>

	<div class="module-table-body">
							<table>
								<tr>
                                	<tr>
	<th><b>No</th>
	<th><b>Nama UKM</th>
	<th><b>Singkatan</th>
    <th><b>Logo</th>
    <th><b>Anggota</th>
</tr>
								</tr>
                                <?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("select * from ukm where fakultas='$fak' ORDER BY kd_ukm DESC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama_full']; ?></td>
										<td><?php echo $data['nama_ukm']; ?></td>
										<td><img src="<?php echo" ukm/$data[logo]"; ?>" width="40" height="30" rel="logo"></td>
										<td><a href="?module=data_anggota&kd=<?php echo $data['kd_ukm']; ?>">Lihat Selengkapnya</a></td>
                                        
                                        
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
							$jmldata = mysql_num_rows(mysql_query("select * from ukm where fakultas='$fak'"));
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