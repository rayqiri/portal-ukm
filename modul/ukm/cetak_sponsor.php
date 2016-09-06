<?php

	include "../../koneksi/koneksi.php";
	include "../../fungsi/class_paging.php";
	include '../../fungsi/fungsi_indotgl.php';
$keg=$_GET['keg'];
$nama_keg=$_GET['nama'];
include"footer_cetak.php";
 ?>
 <body onLoad="javascript:window.print()";><br \>
  
<div style="padding-left:50px; padding-right:50px;">
    <hr style="border: 1px solid #000;">
    </div>
<br>

<div style="padding:10px;">
							<table width="100%" border="1" cellpadding="2" cellspacing="0" >
                            <h3><center><b>DATA SPONSOR KEGIATAN <?php echo"$nama_keg";?></b></center></h3>
								<tr>
									<th align="center" class="cetak" style="width:2%" ><b>No</b></th>
                                    <th align="center" class="cetak" style="width:15%"><b>Nama Instansi</b></th>
									<th align="center" class="cetak" style="width:15%"><b>Tanggal</b></th>
									<th align="center" class="cetak" style="width:10%"><b>Jenis</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Jumlah</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Satuan</b></th>
                                    </tr>
                                    <?php
									$sql=mysql_query("select * from sponsor,material_sponsor where sponsor.id_sponsor=material_sponsor.id_sponsor and sponsor.kd_ukm='$_SESSION[ukm]' and sponsor.id='$keg'");
									$no=1;
									while($data=mysql_fetch_array($sql)){
										?>
                                        <tr>
                                        <td align="center"><?php echo $no;?></td>
		<td><?php echo $data['nama_instansi'];?></td>
        <td><?php echo tgl_indo(date($data['tanggal']));?></td>
		<td><?php echo $data['jenis'];?></td>
        <td><?php echo $data['jumlah'];?></td>
        <td><?php echo $data['satuan'];?></td>
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