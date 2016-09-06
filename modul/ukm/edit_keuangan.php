<?php
$data = mysql_fetch_array(mysql_query("SELECT * FROM bendahara WHERE id_bendahara = '$_GET[id]' and kd_ukm='$_SESSION[ukm]'"));
if ($data['pemasukan']==0)
{$a="disabled";
$b="enabled";
}
else{$a="enabled";
$b="disabled";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DEBIT</title>
</head>

<body>
<form method='POST' action=''>
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>EDIT KEUANGAN</center>
		</td>
	</tr>
	<tr>
		<td>Dana Masuk</td>
		<td>:</td>
		<td>	
			<input name="masuk" type="text" size="20" <?php echo"value='$data[pemasukan]' $a";?>>
		</td>
	</tr>
    <tr>
		<td>Dana Pengeluaran</td>
		<td>:</td>
		<td>	
			<input name="keluar" type="text" size="20" <?php echo"value='$data[pengeluaran]' $b";?>>
		</td>
	</tr>
    <tr>
		<td>Keterangan</td>
		<td>:</td>
		<td>	
			<input name="ket" type="text" size="20" <?php echo"value='$data[keterangan]'";?>>
		</td>
	</tr>
    <tr>  
		<td colspan='2'></td>
		<td>
        <input type='hidden' name='id' <?php echo"value='$data[id_bendahara]'";?> />
			<input name='simpan' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Back' onclick='javascript.history.back()'>";?>
		</td>
	</tr>
    </table>
<?php
if (isset($_POST['simpan'])){
	$id=$_POST['id'];
$kegiatan=$_POST['kegiatan'];
$masuk=$_POST['masuk'];
$keluar=$_POST['keluar'];
$ket=$_POST['ket'];
$date = date('Y-m-d H:i:s');
mysql_query("UPDATE bendahara SET pemasukan='$masuk',pengeluaran='$keluar',keterangan='$ket',date='$date' where id_bendahara='$id'");
?>
	<script>
		alert('DATA TERSIMPAN');window.location ="../master.php?module=laporan_keuangan"
	</script>
<?php	
}
?>
</body>
</html>

