<?php
$q = trim(strip_tags($_GET['term']));
 $ukm=$_session['ukm']; 
$qstring = "SELECT * FROM mahasiswa,anggota WHERE mahasiswa.nim=anggota.nim and anggota.ukm='$ukm' and mahasiswa.nama LIKE '".$q."%'";
//query database untuk mengecek tabel anime 
$result = mysql_query($qstring);
  
while ($row = mysql_fetch_array($result))
{
    $row['value']=htmlentities(stripslashes($row['nama']));
    $row['nim']=(int)$row['nim'];
//buat array yang nantinya akan di konversi ke json
    $row_set[] = $row;
}
//data hasil query yang dikirim kembali dalam format json
echo json_encode($row_set);
?>