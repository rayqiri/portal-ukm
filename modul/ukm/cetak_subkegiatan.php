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
                            <h3><center><b>DATA SUBKEGIATAN KEGIATAN <?php echo"$nama_keg";?></b></center></h3>
								<tr>
									<th align="center" class="cetak" style="width:2%" ><b>No</b></th>
                                    <th align="center" class="cetak" style="width:15%"><b>Nama Subkegiatan</b></th>
									<th align="center" class="cetak" style="width:15%"><b>Tempat Subkegiatan</b></th>
									<th align="center" class="cetak" style="width:10%"><b>Tanggal</b></th>
                                    </tr>
                                    <?php
                                    $no=0;
$result=mysql_query("select * from subkegiatan,kegiatan where subkegiatan.id=kegiatan.id and subkegiatan.id='$keg'");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){
		$kegiatan=$data2['nama_kegiatan'];
		$nama=$data2['nm_subkegiatan'];
		$tempat=$data2['tempat_subkegiatan'];
		$date=$data2['tgl_subkegiatan'];
		$no++;

?>
<tr> 
		<td align="center"><?php echo $no;?></td>
		<td><?php echo $nama;?></td>
        <td><?php echo $tempat;?></td>
		<td><?php echo tgl_indo(date($date));?></td>
</tr>
<?php
}
?>
<tr>
					<th colspan=4>Total Subkegiatan: <?php echo $numrows; ?></th>
</tr>

</table>