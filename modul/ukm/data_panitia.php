<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TAMPIL MAHASISWA</title>

</head>

<body>
<?php
$id=$_GET['id'];
$kegiatan=$_GET['keg'];
?>
<h2><center><span>PANITIA KEGIATAN <?php echo $kegiatan;?></span></center></h2>
<table border='1'>
        
</body>
</html>
<?php

$sql=mysql_query("select * from kepanitiaan where id='$id'");
$ada=mysql_fetch_array($sql);

echo"
<tbody>
		<tr><td class=cc>Ketua</td>         <td class=cb>$ada[ketua]</td></tr>
        <tr><td class=cc>Sekretaris</td>        <td class=cb>$ada[sekretaris]</td></tr>
        <tr><td class=cc>Bendahara</td>      <td class=cb>$ada[bendahara]</td></tr>
		<tr><td class=cc>Koordinator Perlengkapan</td>      <td class=cb>$ada[koordinator1]</td></tr>
        <tr><td class=cc>Koordinator Konsumsi</td>    <td class=cb>$ada[koordinator2]</td></tr>
        <tr><td class=cc>Koordinator Dokumentasi</td>       <td class=cb>$ada[koordinator3]</td></tr>
        <tr><td class=cc>Koordinator Keamanan</td>      <td class=cb>$ada[koordinator4]</td></tr>
		<tr><td class=cc>Koordinator Publikasi</td>    <td class=cb>$ada[koordinator5]</td></tr>
        <tr><td class=cc>Koordinator Sponsor</td>       <td class=cb>$ada[koordinator6]</td></tr>
        <tr><td class=cc>Koordinator Humas</td>      <td class=cb>$ada[koordinator7]</td></tr>
        
</tbody>
</table>

";

?>
<tr>
<td colspan=13><a href="modul/ukm/cetak_panitia.php?keg=<?php echo $id;?>&nama=<?php echo $kegiatan;?>"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a>
</td></tr>
<br>
<br>
</table>