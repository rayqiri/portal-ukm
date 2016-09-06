<?php
	include "fungsi/class_paging.php";
	$fak=$_SESSION['fakultas'];
	$Num_Rows = mysql_num_rows(mysql_query("select * from apbu,ukm where apbu.kd_ukm=ukm.kd_ukm and ukm.fakultas='$fak'"));
?>
<h2><span>Informasi Pengajuan APBU, Total Data: <?php echo $Num_Rows; ?> </span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Proses APBU' onclick=\"window.location.href='?module=proses_apbu';\">";?>
                </th>
                </tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
                                	<tr>
	<th><b>No</th>
	<th><b>UKM</th>
	<th><b>Jumlah</th>
    <th><b>Tanggal</th>
    <th><b>Status</th>
    <th><b>File Proposal</th>
    <th><b>Aksi</th>
</tr>
								</tr>
                                <?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("select * from apbu,ukm where apbu.kd_ukm=ukm.kd_ukm and ukm.fakultas='$fak' ORDER BY apbu.id_apbu DESC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									if ($data['keterangan']=="Sudah Diambil"){$link="enabled";}else{$link="disabled";}
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama_ukm']; ?></td>
										<td><?php echo $data['jumlah']; ?></td>
										<td><?php echo $data['thn_pengambilan']; ?></td>
										<td><?php echo $data['keterangan']; ?></td>
                                        <td><a href='<?php echo $data['file']; ?>'>Download</a></td>
                                        <td><a href='?module=hapus_apbu&id=<?php echo $data['id_apbu'];?>' onClick="return confirm('Anda yakin ingin menghapus Data ini?');"><input type='button' value='HAPUS' <?php echo $link;?>></a>
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
							$jmldata = mysql_num_rows(mysql_query("select * from apbu,ukm where apbu.kd_ukm=ukm.kd_ukm and ukm.fakultas='$fak'"));
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