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
                            <h3><center><b>DATA KEGIATAN <?php echo"$ada[nama_ukm]";?></b></center></h3>
								<tr>
									<th align="center" class="cetak" style="width:2%" ><b>No</b></th>
                                    <th align="center" class="cetak" style="width:15%"><b>Nama Kegiatan</b></th>
                                    <th align="center" class="cetak" style="width:15%"><b>Nama Ketua</b></th>
									<th align="center" class="cetak" style="width:15%"><b>Tempat Kegiatan</b></th>
									<th align="center" class="cetak" style="width:10%"><b>Tanggal Mulai</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Tanggal Selesai</b></th>
									<th align="center" class="cetak" style="width:10%"><b>Status Kegiatan</b></th>
                                    
								</tr>
                                <?php
                                $sql = mysql_query("SELECT * FROM kegiatan,kepanitiaan where kegiatan.id=kepanitiaan.id and kegiatan.kd_ukm='$_SESSION[ukm]' ORDER BY kegiatan.id");
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
                                        <td><?php echo $data['status']; ?></td>
                                        
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
								