<?php

	include "../../koneksi/koneksi.php";
	include "../../fungsi/class_paging.php";
	include '../../fungsi/fungsi_indotgl.php';
$keg=$_GET['keg'];

include"footer_cetak.php";
 ?>
 <body onLoad="javascript:window.print()";><br \>
  
<div style="padding-left:50px; padding-right:50px;">
    <hr style="border: 1px solid #000;">
    </div>
<br>

<div style="padding:10px;">
							<table width="100%" border="1" cellpadding="2" cellspacing="0" >
                            <h3><center><b>DATA PENGURUS <?php echo"$ada[nama_ukm]";?></b></center></h3>
								<tr>
									<th align="center" class="cetak" style="width:2%" ><b>No</b></th>
                                    <th align="center" class="cetak" style="width:5%"><b>NIM</b></th>
                                    <th align="center" class="cetak" style="width:15%"><b>Nama Lengkap</b></th>
									<th align="center" class="cetak" style="width:20%"><b>Alamat</b></th>
									<th align="center" class="cetak" style="width:10%"><b>Kota</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Provinsi</b></th>
									<th align="center" class="cetak" style="width:5%"><b>No Telp</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Tempat Lahir</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Tanggal Lahir</b></th>
									<th align="center" class="cetak" style="width:5%"><b>Angkatan</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Progdi</b></th>
                                   
								</tr>
                                <?php
								$no = 1;
                                $sql = mysql_query("SELECT * FROM mahasiswa,anggota,kota,provinsi,progdi where mahasiswa.nim=anggota.nim and mahasiswa.kd_kota=kota.kd_kota and mahasiswa.kd_provinsi=provinsi.kd_provinsi and mahasiswa.progdi=progdi.kd_progdi and anggota.kd_ukm='$_SESSION[ukm]' ORDER BY mahasiswa.nim ASC");
								
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
                                        <td><?php echo $data['tempat_lahir']; ?></td>
                                        <td><?php echo tgl_indo(date($data['tanggal_lahir'])); ?></td>
                                        <td><?php echo $data['angkatan']; ?></td>
                                        <td><?php echo $data['nm_progdi']; ?></td>
									</tr>
									<?php
									$no++;
								}
								?>
								</table>
								<table width="50%" border="0" align="right">
            <tr>
              <td width="14%">&nbsp;</td>
              <td width="55%">&nbsp;</td>
              <td width="31%">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center">Ketua</td>
              <td align="center">Sekretaris</td>
            </tr>
            <tr>
              <td height="52">&nbsp;</td>
              <td>&nbsp;</td>
              <td id="tt">&nbsp;  </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center">(..........................)</td>
              <td align="center">(..........................)</td>
            </tr>
          </table> 