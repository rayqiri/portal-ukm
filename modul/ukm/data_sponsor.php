<?php
switch($_GET[act]){
	default:
	include "fungsi/class_paging.php";
	$ukm=$_SESSION['ukm'];
	$Num_Rows = mysql_num_rows(mysql_query("SELECT * FROM sponsor where kd_ukm='$ukm'"));
?>
<form method="post" action="">
<table>
<tr>
		<th>Kegiatan</th>
		<td>:</td>
		<td>
        <select name='kegiatan'>
        <option value=''>---pilih---</option>
			<?php 
		$sql2=mysql_query("SELECT * from kegiatan where kd_ukm='$_SESSION[ukm]'");
		while ($data2 = mysql_fetch_array($sql2)){
	echo "<option value='$data2[id]'>$data2[nama_kegiatan]</option>";
		}
		?>
	<input name='ok' type='submit' value='Tampilkan' />
</select>
		</td>
</tr>
</table>
</form>
							<table>
								<tr>
									<th style="width:5%">No</th>
									<th style="width:20%">Kegiatan</th>
									<th style="width:21%">Nama Instansi</th>
									<th style="width:21%">Tanggal</th>
                                    <th style="width:21%">Material Sponsor</th>
                                    <th style="width:21%">Aksi</th>
								</tr>
                                <?php
								if (isset($_POST['ok']))
{
								
								$sql = mysql_query("SELECT * from sponsor,kegiatan where sponsor.id=kegiatan.id and sponsor.kd_ukm='$ukm' and sponsor.id='$_POST[kegiatan]' ORDER BY sponsor.id_sponsor ASC");
								$no = 1;
								while ($data = mysql_fetch_array($sql)){
									$kegiatan=$data['nama_kegiatan'];
									$id=$data['id'];
								$jumlah=number_format("$data[jumlah]",0,",",".");
									?>
                                    <tr>
										<td><?php echo $no; ?></td>
										<td><?php echo $data['nama_kegiatan']; ?></td>
										<td><?php echo $data['nama_instansi']; ?></td>
                                        <td><?php echo tgl_indo(date($data['tanggal'])); ?></td>
                                        <td><a href="?module=data_materialsponsor&id=<?php echo $data['id_sponsor']; ?>&ins=<?php echo $data['nama_instansi']; ?>">Lihat</a></td>
                                        <td><a href="?module=data_sponsor&act=edit_sponsor&id=<?php echo $data['id_sponsor']; ?>">Edit</a> | <a href="?module=data_sponsor&act=hapus_sponsor&id=<?php echo $data['id_sponsor']; ?>" onClick="return confirm('Anda yakin ingin menghapus Sponsor <?php echo $data['nama_instansi']; ?>?');">Hapus</a> </td>
									</tr>
									<?php
									$no++;
								}
}?>
								<tr>
<td colspan=13><a href="modul/ukm/cetak_sponsor.php?keg=<?php echo $id;?>&nama=<?php echo $kegiatan;?>"  target="_blank" ><input type="button" name="print"  value="Cetak"/></a>
</td></tr>
                                </table>
								                                 
</body>
</html>
<?php
break;

case"edit_sponsor":
$data = mysql_fetch_array(mysql_query("SELECT * FROM sponsor WHERE id_sponsor = '$_GET[id]' and kd_ukm='$_SESSION[ukm]'"));
?>
<html>
<head>
<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>


<script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
		dateFormat  : "yy-mm-dd", 
          changeMonth : true,
          changeYear  : true
		  
        });
      });
       	</script>
		</head>
		<body>
 <form method='POST' action=''>
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>EDIT DATA SPONSOR</center>
		</td>
	</tr>
	<tr>
		<td>Nama Instansi</td>
		<td>:</td>
		<td>
			<input name='instansi' type='text' size='30' <?php echo"value='$data[nama_instansi]'";?>>
		</td>
	</tr>
    <tr>
            <td>Tanggal Dapat</td>
            <td>:</td>
            <td><input name='tgl_dapat' type='text' size='30' id='tanggal' <?php echo"value='$data[tanggal]'";?>></td>
          </tr>
	<tr>
		<td colspan='2'></td>
		<td>
		<input type='hidden' name='id' <?php echo"value='$data[id_sponsor]'";?>>
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Kembali' onclick=\"window.location.href='?module=data_sponsor';\">";?>
		</td>
	</tr>
</table>
</form>
    </body>
</html>
<?php
session_start();
if($_POST['save'])
{
	$id=$_POST['id'];
	$instansi=$_POST['instansi'];
	$tanggal= $_POST['tgl_dapat'];		
	
//disini berisi perintah penyimpanan atau prosedur simpan kedalam database
		mysql_query("update sponsor set nama_instansi='$instansi',tanggal='$tanggal' where id_sponsor='$id'");

	echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');window.location ='../master.php?module=data_sponsor'</script>";	
	
	
}
break;
case"hapus_sponsor":
mysql_query("DELETE FROM sponsor WHERE id_sponsor = '$_GET[id]'");
mysql_query("DELETE FROM material_sponsor WHERE id_sponsor = '$_GET[id]'");
	echo"<script language='javascript'>window.location ='../master.php?module=data_sponsor'</script>";
break;

}
?>