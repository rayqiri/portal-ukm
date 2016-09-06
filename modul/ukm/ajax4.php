<?php 
include "../../koneksi/koneksi.php";

$idprodi = $_GET['id']; 
echo "<p><b><i> Makul: </i></b></p>";
echo "<select name='makul'>";
$sql = mysql_query("SELECT makul.kd_makul,makul.nama_makul FROM krs,makul WHERE makul.kd_makul=krs.kd_makul AND krs.idprodi = '$idprodi' group by kd_makul ASC"); 
while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[kd_makul]'>$data[nama_makul]</option>";
}
echo "</select>
<input type=submit name=tampil value=TAMPILKAN>
";
?> 
