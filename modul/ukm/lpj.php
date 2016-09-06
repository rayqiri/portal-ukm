<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LPJ HMJ TI UMK</title>
</head>
<?php
switch($_GET['act']){
	default:
?>
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
<h2><center>LAPORAN PERTANGGUNG JAWABAN HMJ TI UMK</center></h2>
<table>
<?php
if ($_POST['ok']){
$sql=mysql_query("select * from kegiatan,kepanitiaan where kegiatan.id=kepanitiaan.id and kegiatan.id='$_POST[kegiatan]'");
$ada=mysql_fetch_array($sql);
$id=$ada['id'];
$kegiatan=$ada['nama_kegiatan'];
echo"

		<tr><td colspan='2'><img alt='galeri' src='kegiatan/$ada[photo]' width='200' height='200'></td></tr>
		<tr><td >Nama Kegiatan</td>         <td>$ada[nama_kegiatan]</td></tr>
        <tr><td >Ketua</td>        <td>$ada[ketua]</td></tr>
        <tr><td >Tempat</td>      <td>$ada[tempat]</td></tr>
        <tr><td >Tanggal Mulai</td>    <td>".tgl_indo(date($ada['tanggal_mulai']))."</td></tr>
		<tr><td >Tanggal Selesai</td>    <td>".tgl_indo(date($ada[tanggal_selesai]))."</td></tr>
        <tr><td >Laporan Rapat</td>       <td><a href='modul/ukm/cetak_rapat.php?keg=$id&nama=$kegiatan'>Cetak</a></td></tr>
        <tr><td >Laporan Sponsor</td>      <td><a href='modul/ukm/cetak_sponsor.php?keg=$id&nama=$kegiatan'>Cetak</a></td></tr>
        <tr><td >Laporan Keuangan</td>        <td><a href='modul/ukm/cetak_laporan_keuangan.php?keg=$id&nama=$kegiatan'>Cetak</a></td></tr>
		 <tr><td >Laporan Surat</td>        <td><a href='modul/ukm/cetak_surat.php?keg=$id&nama=$kegiatan'>Cetak</a></td></tr>
";

?>
</table>
<?php
}
break;

case"laporan_rapat":
$nama=$_GET['nama'];
$id=$_GET['id'];
?>
<h2><center>DATA RAPAT KEGIATAN <?php echo"$nama";?></center></h2>
<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:20%">Kegiatan</th>
									<th style="width:21%">Agenda Rapat</th>
									<th style="width:21%">Tempat</th>
									<th style="width:21%">Jam</th>
									<th style="width:21%">Tanggal</th>
									<th style="width:21%">Hasil Rapat</th>
								</tr>
<?php
$no=1;
$a=mysql_query("SELECT * from rapat,kegiatan where rapat.id=kegiatan.id and rapat.id='$id' ORDER BY rapat.id_rapat ASC");
$numrows=mysql_num_rows($a);
while ($rpt=mysql_fetch_array($a)){
?>
<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $rpt['nama_kegiatan']; ?></td>
										<td><?php echo $rpt['judul']; ?></td>
										<td><?php echo $rpt['tempat_rapat']; ?></td>
										<td><?php echo $rpt['jam']; ?></td>
                                        <td><?php echo $rpt['tanggal_rapat']; ?></td>
										<td><a href='<?php echo $rpt[hasil_rapat];?>'>Download</a></td>										
                                        </tr>
                                        
<?php
$no++;

}
echo"
<tr>
					<th colspan='7'>Total Rapat: $numrows</th>
</tr>
<tr>
<td colspan='7'><input type='button' value='BACK' onclick=\"window.history.back();\"></td></tr>
</table>";
break;
case "laporan_sponsor":
$nama=$_GET['nama'];
$id=$_GET['id'];
?>
<h2><center>DATA SPONSOR KEGIATAN <?php echo"$nama";?></center></h2>
<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:20%">Kegiatan</th>
									<th style="width:21%">Nama Sponsor</th>
									<th style="width:21%">Jenis Sponsor</th>
									<th style="width:21%">Jumlah</th>
									<th style="width:21%">Tanggal</th>
								</tr>
<?php
$no=1;
$a=mysql_query("SELECT * from kegiatan,sponsor where sponsor.id=kegiatan.id and kegiatan.id='$id' ORDER BY sponsor.id_sponsor ASC");
$numrows=mysql_num_rows($a);
while ($rpt=mysql_fetch_array($a)){
?>
<tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $rpt['nama_kegiatan']; ?></td>
										<td><?php echo $rpt['nama_instansi']; ?></td>
										<td><?php echo $rpt['jenis']; ?></td>
										<td><?php echo $rpt['jumlah']; ?></td>
                                        <td><?php echo $rpt['tanggal']; ?></td>	
                                        </tr>
<?php
$no++;

}
echo"
<tr>
					<th colspan=6>Total Sponsor: $numrows</th>
</tr>
<tr>
<td colspan='6'><input type='button' value='BACK' onclick='\window.history.back();\'></td></tr>
</table>";
break;

case "laporan_keuangan":
$nama=$_GET['nama'];
$id=$_GET['id'];
?>
<h2><center>LAPORAN KEUANGAN HMJ TI UMK KEGIATAN <?php echo"$nama";?></center></h2>
<table border='1'>

<tr>
		<th width='100' align='center'>NO</th>
        <th width='100' align='center'>KEGIATAN</th>
        <th width='100' align='center'>PEMASUKAN</th>
		<th width='100' align='center'>PENGELUARAN</th>
        <th width='100' align='center'>KETERANGAN</th>
        <th width='100' align='center'>SALDO</th>
		<th width='100' align='center'>TANGGAL</th>
</tr>
<?php
$no=0;
$result=mysql_query("select * from bendahara,kegiatan where kegiatan.id=bendahara.id and bendahara.id='$id'");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){$kegiatan=$data2['nama_kegiatan'];
		$masuk=$data2['pemasukan'];
		$keluar=$data2['pengeluaran'];
		$ket=$data2['keterangan'];
		$saldo=$data2['saldo'];
		$date=$data2['date'];
		$no++;?>

<tr> 
		<td align="center"><?php echo $no;?></td>
        <td><?php echo $kegiatan;?></td>
		<td><?php echo $masuk;?></td>
        <td><?php echo $keluar;?></td>
        <td><?php echo $ket;?></td>
		<td><?php echo $saldo;?></td>
		<td><?php echo $date;?></td>
</tr>
<?php
}
$sql=mysql_query("select * from bendahara where id='$id'");
while ($tot=mysql_fetch_array($sql)){
$totmasuk=$totmasuk+$tot['pemasukan'];
$totkeluar=$totkeluar+$tot['pengeluaran'];
}
?>
<tr>
					<th colspan=7>Total Pemasukan: <?php echo $totmasuk; ?></th>
</tr>
<tr>
					<th colspan=7>Total Pengeluaran: <?php echo $totkeluar; ?></th>
</tr>
<tr>
<td colspan='7'><?php echo"<input type='button' value='BACK' onclick=\"window.history.back();\">";?></td></tr>
</table>
<?php
break;

case "laporan_surat":
$nama=$_GET[nama];
$id=$_GET[id];
?>
<h2><center>DATA SURAT HMJ TI UMK KEGIATAN <?php echo"$nama";?></center></h2>
<table border='1'>

<tr>
		<th width='100' align='center'>NO</th>
        <th width='100' align='center'>KEGIATAN</th>
        <th width='100' align='center'>JENIS SURAT</th>
		<th width='100' align='center'>NO SURAT</th>
		<th width='100' align='center'>TANGGAL</th>
        <th width='100' align='center'>LINK</th>
</tr>
<?php
$no=0;
$result=mysql_query("select * from surat,kegiatan where surat.id=kegiatan.id and surat.id='$id'");
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
        <td><?php echo $kegiatan;?></td>
		<td><?php echo $surat;?></td>
        <td><?php echo $no_surat;?></td>
		<td><?php echo $date;?></td>
        <td><?php echo"<a href='$link'>DOWNLOAD</a>";?></td>
</tr>
<?php
}
?>
<tr>
					<th colspan=15>Total Surat: <?php echo $numrows; ?></th>
</tr>
<tr>
<td colspan='6'><?php echo"<input type='button' value='BACK' onclick=\"window.history.back();\">";?></td></tr>
</table>
<?php
break;
}
?>
</body>
</html>