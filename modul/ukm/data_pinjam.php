<?php
	include "fungsi/class_paging.php";
	$ukm=$_SESSION['ukm'];
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM pinjam,inventaris where pinjam.kd_inventaris=inventaris.kd_inventaris and inventaris.kd_ukm='$ukm'"));
?>
<h2><span>Informasi Pinjam Inventaris, Total Data: <?php echo $Num_Rows; ?> </span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<th><?php echo "<input type='button' value='Tambah Data' onclick=\"window.location.href='?module=pinjam';\">";?>
                <?php echo "<input type='button' value='Kembalikan Barang' onclick=\"window.location.href='?module=kembali';\">";?></th>
                </tr>
			<tr>	
				<td>
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
                                	<th><b>No</th>
									<th><b>NIM</th>
									<th><b>Nama</th>
    								<th><b>Prodi</th>
    								<th><b>Nama Barang</th>
    								<th><b>Jumlah</th>
									<th><b>Tanggal Pinjam</th>
                                    <th><b>Tanggal Kembali</th>
                                    <th><b>Status</th>
								</tr>
                                <?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * from pinjam,inventaris where pinjam.kd_inventaris=inventaris.kd_inventaris and inventaris.kd_ukm='$ukm' and inventaris.status='pinjam' ORDER BY pinjam.tgl_pinjam DESC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nim']; ?></td>
										<td><?php echo $data['nama']; ?></td>
										<td><?php echo $data['prodi']; ?></td>
										<td><?php echo $data['nama_barang']; ?></td>
                                        <td><?php echo $data['jml_pinjam']; ?></td>
                                        <td><?php echo tgl_indo(date($data['tgl_pinjam'])); ?></td>
                                        <td><?php echo tgl_indo(date($data['update_date'])); ?></td>
                                        <td><?php echo $data['status']; ?></td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM pinjam,inventaris where pinjam.kd_inventaris=inventaris.kd_inventaris and inventaris.kd_ukm='$ukm'"));
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