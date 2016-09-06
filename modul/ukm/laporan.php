<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Laporan Keuangan</title>
</head>

<body>
<?php
$ukm=$_SESSION['ukm'];
?>
<form method="post" action="">
<table>
<tr>
		<th>Kegiatan</th>
		<td>:</td>
		<td>
        <select name='kegiatan'>
        <option value=''>---Pilih Kegiatan---</option>
			<?php 
		$sql=mysql_query("SELECT * from kegiatan where kd_ukm='$ukm'");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id]'>$data[nama_kegiatan]</option>";
		}
		?>
	<input name='ok' type='submit' value='Tampilkan' />
</select>
		</td>
</tr>
</table>
</form>
    
<h2><center>LAPORAN KEUANGAN</center></h2>
<table>

<tr>
		<th width='100' align='center'>NO</th>
        <th width='100' align='center'>TANGGAL</th>
        <th width='100' align='center'>KEGIATAN</th>
        <th width='100' align='center'>KETERANGAN</th>
        <th width='100' align='center'>PEMASUKAN</th>
		<th width='100' align='center'>PENGELUARAN</th>
        <th width='100' align='center'>SALDO</th>
        <th width='100' align='center'>AKSI</th>
</tr>
<?php
if (isset($_POST['ok']))
{
$no=0;
$result=mysql_query("select * from bendahara,kegiatan where kegiatan.id=bendahara.id and bendahara.id='$_POST[kegiatan]' order by bendahara.date asc");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){
		$kegiatan=$data2['nama_kegiatan'];
		$masuk=number_format("$data2[pemasukan]",0,",",".");
		$keluar=number_format("$data2[pengeluaran]",0,",",".");
		$ket=$data2['keterangan'];
		$sld=$sld+$data2['pemasukan']-$data2['pengeluaran'];
		$saldo=number_format("$sld",0,",",".");
		$date=tgl_indo(date($data2['date']));
		$id=$data2['id'];
		$no++;
		if($masuk=="0"){$msk="-";}else{$msk=$masuk;}
		if($keluar=="0"){$klr="-";}else{$klr=$keluar;}

?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $date;?></td>
        <td><?php echo $kegiatan;?></td>
        <td><?php echo $ket;?></td>
		<td align="right">Rp. <?php echo $msk;?></td>
        <td align="right">Rp. <?php echo $klr;?></td>
		<td align="right">Rp. <?php echo $saldo;?></td>
        <td><a href="?module=edit_keuangan&id=<?php echo $data2['id_bendahara'];?>">EDIT</a>|<a href="?module=hapus_keuangan&id=<?php echo $data2['id_bendahara'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?>?');">HAPUS</a></td>
</tr>

<?php		
}
$sql=mysql_query("select * from bendahara where id='$_POST[kegiatan]'");
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
<tr>
<td colspan=15><?php echo"<input type='button' value='BACK' onclick=\"window.history.back();\">";?>
<a href="modul/ukm/cetak_laporan_keuangan.php?keg=<?php echo"$id" ; ?>"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a>
</td></tr>
</table>
<?php
}else{
$no=0;
$ukm2=$_SESSION['ukm'];
$result2=mysql_query("select * from bendahara,kegiatan where kegiatan.id=bendahara.id and bendahara.kd_ukm='$ukm2' order by bendahara.date asc");
$numrows2=mysql_num_rows($result2);
while($data3=mysql_fetch_array($result2)){
		$kegiatan2=$data3['nama_kegiatan'];
		$masuk2=number_format("$data3[pemasukan]",0,",",".");
		$keluar2=number_format("$data3[pengeluaran]",0,",",".");
		$ket2=$data3['keterangan'];
		$sld2=$sld2+$data3['pemasukan']-$data3['pengeluaran'];
		$saldo2=number_format("$sld2",0,",",".");
		$date2=tgl_indo(date($data3['date']));
		$no++;
		if($masuk2=="0"){$msk2="-";}else{$msk2=$masuk2;}
		if($keluar2=="0"){$klr2="-";}else{$klr2=$keluar2;}
?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $date2;?></td>
        <td><?php echo $kegiatan2;?></td>
        <td><?php echo $ket2;?></td>
		<td align="right">Rp. <?php echo $msk2;?></td>
        <td align="right">Rp. <?php echo $klr2;?></td>
		<td align="right">Rp. <?php echo $saldo2;?></td>
		<td><a href="?module=edit_keuangan&id=<?php echo $data3['id_bendahara'];?>">EDIT</a>|<a href="?module=hapus_keuangan&id=<?php echo $data3['id_bendahara'];?>" onClick="return confirm('Anda yakin ingin menghapus data ini?>?');">HAPUS</a></td>
</tr>
<?php
}
$sql2=mysql_query("select * from bendahara where kd_ukm='$ukm2'");
while ($tot2=mysql_fetch_array($sql2)){
$totmasuk2=$totmasuk2+$tot2['pemasukan'];
$totm2=number_format("$totmasuk2",0,",",".");
$totkeluar2=$totkeluar2+$tot2['pengeluaran'];
$totk2=number_format("$totkeluar2",0,",",".");
$totsld2=$totmasuk2-$totkeluar2;
$tots2=number_format("$totsld2",0,",",".");
}

?>
<tr>
					<th colspan=15 align="left">Total Pemasukan: Rp. <?php echo $totm2; ?></th>
</tr>
<tr>
					<th colspan=15 align="left">Total Pengeluaran: Rp. <?php echo $totk2; ?></th>
</tr>
<tr>
					<th colspan=15 align="left">Total Saldo: Rp. <?php echo $tots2; ?></th>
</tr>
<tr>
<td colspan=15><a href="modul/ukm/cetak_laporan_keuangan2.php"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a></td></tr>
</table>
<?php
}
?>
</body>
</html>