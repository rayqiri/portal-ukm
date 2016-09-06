<?php
extract ($_GET); 
extract ($_POST);
include "../../koneksi/koneksi.php";
	$fak=substr($_POST['kode'],0,1);
	$prog=substr($_POST['kode'],0,-1);
	?>
    <div>
		
		<td>
		<select name='progdi'>
				<option>---Pilih Progdi---</option>
                <?php
				$query4 = "SELECT * from progdi where kd_fakultas ='$fak'";
	$sql4 = mysql_query ($query4);
	while ($hasil4 = mysql_fetch_array ($sql4)) {
					echo"
				<option value='$hasil4[kd_progdi]'";if($prog=="$hasil4[kd_progdi]"){ echo"selected";}echo">$hasil4[nm_progdi]</option>";}?>
			</select>
		</td>
		</div>
	    
        