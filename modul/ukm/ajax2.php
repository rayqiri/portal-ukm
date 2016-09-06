<?php 
include "../../koneksi/koneksi.php";

$idprodi = $_GET['id']; 
echo "<p><b><i> Kelas: </i></b></p>";
echo "<select name='kelas'>";
$sql = mysql_query("SELECT kelas.id_kelas,kelas.nama_kelas FROM krs,kelas WHERE kelas.id_kelas=krs.id_kelas AND idprodi = '$idprodi' group by id_kelas ASC"); 
while ($data = mysql_fetch_array($sql)){
	echo "<option value='$data[id_kelas]'>$data[nama_kelas]</option>";
}
echo "</select>
<input type=submit name=tampil value=TAMPILKAN>
";
?> 
