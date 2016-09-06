<?php
extract ($_GET); 
extract ($_POST);
include "../../koneksi/koneksi.php";
	$prov=substr($_POST['kode'],0,1);
	$kota=substr($_POST['kode'],0,-1);
	?>
    <div>
		
		<td>
		<select name='kota'>
				<option>---Pilih Kota---</option>
                <?php
				$query4 = "SELECT * from kota where kd_provinsi ='$prov'";
	$sql4 = mysql_query ($query4);
	while ($hasil4 = mysql_fetch_array ($sql4)) {
					echo"
				<option value='$hasil4[kd_kota]'";if($prov=="$hasil4[kd_kota]"){ echo"selected";}echo">$hasil4[kota]</option>";}?>
			</select>
		</td>
		</div>
	    
        