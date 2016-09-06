<?php
$id=$_GET['id'];
$result=mysql_query("select * from bendahara,kegiatan where kegiatan.id=bendahara.id and bendahara.id='$id' order by bendahara.date asc");
$numrows=mysql_num_rows($result);
$ada=mysql_fetch_array($result);
?>

<h2><center>LAPORAN KEUANGAN KEGIATAN <?php echo $ada['nama_kegiatan'];?></center></h2>
<table border='1'>

<tr>
		<th width='100' align='center'>NO</th>
        <th width='100' align='center'>TANGGAL</th>
        <th width='100' align='center'>KETERANGAN</th>
        <th width='100' align='center'>PEMASUKAN</th>
		<th width='100' align='center'>PENGELUARAN</th>
        <th width='100' align='center'>SALDO</th>
</tr>
<?php

$no=0;

while($data2=mysql_fetch_array($result)){
		$kegiatan=$data2['nama_kegiatan'];
		$masuk=number_format("$data2[pemasukan]",0,",",".");
		$keluar=number_format("$data2[pengeluaran]",0,",",".");
		$ket=$data2['keterangan'];
		$sld=$sld+$data2['pemasukan']-$data2['pengeluaran'];
		$saldo=number_format("$sld",0,",",".");
		$date=tgl_indo(date($data2['date']));
		$no++;
		if($masuk=="0"){$msk="-";}else{$msk=$masuk;}
		if($keluar=="0"){$klr="-";}else{$klr=$keluar;}

?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $date;?></td>
        <td><?php echo $ket;?></td>
		<td>Rp. <?php echo $msk;?></td>
        <td>Rp. <?php echo $klr;?></td>
		<td>Rp. <?php echo $saldo;?></td>
		
</tr>

<?php		
}
$sql=mysql_query("select * from bendahara where id='$id'");
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