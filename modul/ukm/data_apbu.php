<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Data Proposal</title>
</head>

<body>
    
<h2><center>DATA PENGAJUAN APBU</center></h2>
<table border='1'>

<tr>
		<th width='100' align='center'>NO</th>
        <th width='100' align='center'>Jumlah Dana</th>
		<th width='100' align='center'>Tanggal</th>
        <th width='100' align='center'>Keterangan</th>
</tr>
<?php
$ukm=$_SESSION['ukm'];	
$no=0;
$result=mysql_query("select * from apbu order by thn_pengambilan asc");
$numrows=mysql_num_rows($result);
while($data2=mysql_fetch_array($result)){
		$jumlah=number_format("$data2[jumlah]",0,",",".");
		$tanggal=tgl_indo(date($data2['thn_pengambilan']));
		$ket=$data2['keterangan'];
		$no++;
}
?>
<tr> 
		<td align="center"><?php echo $no;?></td>
        <td>Rp.<?php echo $jumlah;?></td>
		<td><?php echo $tanggal;?></td>
		<td><?php echo $ket;?></td>
</tr>

<tr>
					<th colspan=15>Total Data: <?php echo $numrows; ?></th>
</tr>

</table>

