<br>
<?php

	include "fungsi/class_paging.php";
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM akun"));
?>
<h2><span>Informasi Akun, Total: <?php echo $Num_Rows; ?> Akun</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<td><?php echo "<input type='button' value='Tambah Akun UKM' onclick=\"window.location.href='?module=akun_ukm';\">";?><?php echo "<input type='button' value='Tambah Akun Admin' onclick=\"window.location.href='?module=akun_admin';\">";?></td>
                </tr>
			</table>
                
					<div style="font-family: arial; overflow: scroll; width: 100%; height: 350px;">
						<div style="text-align: center; width: 100%; padding: 0 px; overflow: hidden;">
							<table>
								<tr>
									<th style="width:5%">No</th>
                                    <th style="width:20%">Username</th>
									<th style="width:20%">Password</th>
                                    <th style="width:20%">Level</th>
                                    <th style="width:15%">Edit</th>
                                    <th style="width:15%">Hapus</th>
                                     <th style="width:15%">Reset Password</th>
								</tr>
                                <?php
								$p      = new PagingDosen;
								$batas  = 10;
								$posisi = $p->cariPosisi($batas);
								
								$sql = mysql_query("SELECT * FROM akun ORDER BY id_akun ASC LIMIT $posisi,$batas");
								$no = $posisi+1;
								while ($data = mysql_fetch_array($sql)){
									if ($data['level']=="1"){$lvl="Administrator";}
									elseif ($data['level']=="2"){$lvl="UKM";}
									else{$lvl="Super Admin";}
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['username']; ?></td>
                                        <td><?php echo $data['password'];?></td>
                                        <td><?php echo $lvl;?></td>
                                        <?php
										$a=mysql_query("select * from akun where id_akun='$data[id_akun]'");
										$b=mysql_fetch_array($a);
										if ($b['level']=="0"){$s="disabled";
										}else{$s="enabled";}
										?>
                                        <td><a href="?module=edit_akun&id=<?php echo $data['id_akun'];?>"><input type='button' value='EDIT'></a> </td>
                                        
                                        <td><a href="?module=hapus_akun&id=<?php echo $data['id_akun'];?>" onClick="return confirm('Anda yakin ingin menghapus Akun<?php echo $data['username']; ?>?');"><input type='button' value='HAPUS' <?php echo $s;?>></a> </td>
                                        <td><a href="?module=reset_akun&id=<?php echo $data['id_akun'];?>&pas=<?php echo $data['username'];?>" onClick="return confirm('Anda yakin ingin mereset password Akun<?php echo $data['username']; ?>?');"><input type='button' value='Reset' <?php echo $s;?>></a> </td>
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
							$jmldata = mysql_num_rows(mysql_query("SELECT * FROM akun"));
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
