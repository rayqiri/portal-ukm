<?php
extract ($_GET); 
extract ($_POST);
include "../../koneksi/koneksi.php";
	$fak=$_POST['kode'];
	if ($fak==2){
	?>
    <div>
		
		<td>
		<select name='fakultas'>
				<option>---Pilih Fakultas---</option>
                <?php
				$query4 = "SELECT * from fakultas";
	$sql4 = mysql_query ($query4);
	while ($hasil4 = mysql_fetch_array ($sql4)) {
					echo"
				<option value='$hasil4[kd_fakultas]'>$hasil4[fakultas]</option>";}?>
			</select>
		</td>
		</div>
	    <?php
	}else{}
        ?>