<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>INPUT DATA SPONSOR</title>
<link type="text/css" href="js/themes/base/ui.all.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/ui.datepicker.js"></script>
<script type="text/javascript">
 $(document).ready(function(){

    var counter = 2;
    $("#add").click(function () {
    if(counter==11){
        alert("Too many boxes");
        return false;
    }   
        $("#textBoxes").append("<tr id='d"+counter+"'><td>Jenis Barang "+counter+"</td><td>:</td><td><input type='text' id='t"+counter+"' name='jns["+counter+"]' size='30'>&nbsp;Jumlah&nbsp;:<input type='text' id='t"+counter+"' name='jml["+counter+"]' size='10'>&nbsp;Satuan&nbsp;:<input type='text' id='t"+counter+"' name='sat["+counter+"]' size='10'></td></tr>\n");
        ++counter;
    });

    $("#remove").click(function () {
    if(counter==1){
        alert("No boxes");
        return false;
    }   
        --counter;
        $("#d"+counter).remove();
    });
  });
</script>   

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
    <?php
$ukm=$_SESSION['ukm'];
?>
        <form method='POST' action=''>
<table>
	<tr>
		<td height='50' colspan='3'>
			<center>INPUT DATA SPONSOR</center>
		</td>
	</tr>
	<tr>
		<td>Kegiatan</td>
		<td>:</td>
		<td>
        <select name='kegiatan'>
        <option value=''>---Pilih---</option>
			<?php 
		$sql=mysql_query("SELECT * from kegiatan where kd_ukm='$ukm' and status=''");
		while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id]'>$data[nama_kegiatan]</option>";
}
echo "</select>";
		?>
		</td>
	</tr>
	<tr>
		<td>Nama Instansi</td>
		<td>:</td>
		<td>
			<input name='instansi' type='text' size='30' id='cari'>
		</td>
	</tr>
    <tr>
		<td>Jumlah Uang</td>
		<td>:</td>
		<td>
			<input name='uang' type='text' size='30'>
		</td>
	</tr>
    <tr>
		<td>Jenis Barang</td>
		<td>:</td>
		<td>
			<input name='jns[1]' type='text' size='30'>&nbsp; Jumlah : <input name='jml[1]' type='text' size='10'>&nbsp; Satuan : <input name='sat[1]' type='text' size='10'>&nbsp;<input type='button' value='add' id='add'>
		
<input type='button' value='remove' id='remove'>
		</td>
        
	</tr>
    
        
    </table>
	<table>
    <tr>
    	<td id='textBoxes'>
</td>
</tr>
</table>
<table>
    <tr>
            <td>Tanggal Dapat</td>
            <td>:</td>
            <td><input name='tgl_dapat' type='text' size='30' id='tanggal'></td>
          </tr>
	<tr>
		<td colspan='2'></td>
		<td>
			<input name='save' type='submit' value='Simpan'>
			<input type='reset' name='reset' value='Batal'>
			<?php echo"<input type='button' value='Kembali' onclick=\"window.location.href='?module=data_dosen';\">";?>
		</td>
	</tr>
</table>
</form>
    </body>
</html>
<?php

if(isset($_POST['save']))
{
	$kegiatan=$_POST['kegiatan'];
	$instansi=$_POST['instansi'];
	$tanggal= $_POST['tgl_dapat'];
	$uang= $_POST['uang'];		
	$jumlah=count($_POST['jns']);
	mysql_query("insert into sponsor(id_sponsor,kd_ukm,id,nama_instansi,tanggal) values(null,'$ukm','$kegiatan','$instansi','$tanggal')");
	$q=mysql_query("select id_sponsor from sponsor where nama_instansi='$instansi' and id='$kegiatan'");
	$b=mysql_fetch_array($q);
	$kd=$b['id_sponsor'];
	
	
	if(empty($uang)){
	for($i=1; $i <= $jumlah; $i++)
{
	
	$jns=$_POST['jns'][$i];
	$jml=$_POST['jml'][$i];
	$sat=$_POST['sat'][$i];
	
	mysql_query("insert into material_sponsor(id_sponsor,jenis,jumlah,satuan) values('$kd','$jns','$jml','$sat')");
	
}
echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');</script>";
	}else{
		mysql_query("insert into material_sponsor(id_sponsor,jenis,jumlah,satuan) values('$kd','Uang','$uang','Rupiah')");
	mysql_query("insert into bendahara(id,kd_ukm,pemasukan,keterangan,date)values('$kegiatan','$ukm','$uang','$instansi','$tanggal')");
		for($i=1; $i <= $jumlah; $i++)
{
	
	$jns=$_POST['jns'][$i];
	$jml=$_POST['jml'][$i];
	$sat=$_POST['sat'][$i];
	
	mysql_query("insert into material_sponsor(id_sponsor,jenis,jumlah,satuan) values('$kd','$jns','$jml','$sat')");
	
}
		
		echo"<script language='javascript'>alert('DATA TERSIMPAN!!!');</script>";
	}
		
		
	
	
}
?>