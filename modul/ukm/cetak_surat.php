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
                            <h3><center><b>DATA SURAT KEGIATAN <?php echo"$nama_keg";?></b></center></h3>
								<tr>
									<th align="center" class="cetak" style="width:2%" ><b>No</b></th>
                                    <th align="center" class="cetak" style="width:15%"><b>Keperluan</b></th>
									<th align="center" class="cetak" style="width:15%"><b>Jenis Surat</b></th>
									<th align="center" class="cetak" style="width:10%"><b>No Surat</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Tanggal</b></th>
                                    </tr>
                                    <?php
                                    $no=0;
$result=mysql_query("select * from surat,kegiatan where surat.id=kegiatan.id and surat.id='$keg'");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){
		$kegiatan=$data2['nama_kegiatan'];
		$surat=$data2['jns_surat'];
		$no_surat=$data2['no_surat'];
		$date=$data2['tgl_surat'];
		$link=$data2['link'];
		$no++;

?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $data2['judul_surat'];?></td>
		<td><?php echo $surat;?></td>
        <td><?php echo $no_surat;?></td>
		<td><?php echo tgl_indo(date($date));?></td>
</tr>
<?php
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