<?php

	include "../../koneksi/koneksi.php";
	include "../../fungsi/class_paging.php";
	include '../../fungsi/fungsi_indotgl.php';
include"footer_cetak.php";
 ?>
 <body onLoad="javascript:window.print()";><br \>
  
<div style="padding-left:50px; padding-right:50px;">
    <hr style="border: 1px solid #000;">
    </div>
<br>

<div style="padding:10px;">
							<table width="100%" border="1" cellpadding="2" cellspacing="0" >
                            <h3><center><b>Laporan Keuangan <?php echo"$ada[nama_ukm]";?> Tanggal <?php echo tgl_indo(date('Y_m_d'));?></b></center></h3>
								<tr>
									<th align="center" class="cetak" style="width:2%" ><b>No</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Tanggal</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Kegiatan</b></th>
									<th align="center" class="cetak" style="width:40%"><b>Uraian</b></th>
									<th align="center" class="cetak" style="width:10%"><b>Pemasukan</b></th>
                                    <th align="center" class="cetak" style="width:10%"><b>Pengeluaran</b></th>
									<th align="center" class="cetak" style="width:10%"><b>Saldo</b></th>
                                   
								</tr>

<?php

$no=0;
$result=mysql_query("select * from bendahara,kegiatan where kegiatan.id=bendahara.id and bendahara.kd_ukm='$_SESSION[ukm]' order by bendahara.date asc");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){
		$kegiatan=$data2['nama_kegiatan'];
		$masuk=number_format("$data2[pemasukan]",0,",",".");
		$keluar=number_format("$data2[pengeluaran]",0,",",".");
		$ket=$data2['keterangan'];
		$sld=$sld+$data2['pemasukan']-$data2['pengeluaran'];
		$saldo=number_format("$sld",0,",",".");
		$date=$data2['date'];
		$no++;
		if($masuk=="0"){$msk="-";}else{$msk=$masuk;}
		if($keluar=="0"){$klr="-";}else{$klr=$keluar;}

?>
<tr> 
		<td align="center" align="center"><?php echo $no;?></td>
        <td class="cetak" align="center"><?php echo tgl_indo(date($date));?></td>
        <td class="cetak" align="left"><?php echo $kegiatan;?></td>
		<td class="cetak" align="left"><?php echo $ket;?></td>
        <td class="cetak" align="right">Rp. <?php echo $msk;?></td>
        <td class="cetak" align="right">Rp. <?php echo $klr;?></td>
        
		<td class="cetak" align="right">Rp. <?php echo $saldo;?></td>
		
</tr>

<?php		
}
$sql=mysql_query("select * from bendahara where kd_ukm='$_SESSION[ukm]'");
while ($tot=mysql_fetch_array($sql)){
$totmasuk=$totmasuk+$tot['pemasukan'];
$totm=number_format("$totmasuk",0,",",".");
$totkeluar=$totkeluar+$tot['pengeluaran'];
$totk=number_format("$totkeluar",0,",",".");
$totsld=$totmasuk-$totkeluar;
$tots=number_format("$totsld",0,",",".");

}
?>
<tr>
					<th colspan=15>Total Pemasukan: Rp. <?php echo $totm; ?></th>
</tr>
<tr>
					<th colspan=15>Total Pengeluaran: Rp. <?php echo $totk; ?></th>
</tr>
<tr>
					<th colspan=15>Total Saldo: Rp. <?php echo $tots; ?></th>
</tr> 
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
              <td align="center">Bendahara</td>
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