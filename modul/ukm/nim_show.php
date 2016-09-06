
<?php
    if(isset($_POST['nim'])) {
	$queryString = $_POST['nim'];
		if(strlen($queryString) >0) {
		$sql ="SELECT * FROM mahasiswa 
						WHERE nim LIKE '$queryString%' 
						ORDER BY nim ASC";
		$qr  = mysql_query($sql) or die ("Gagal Query");
			if($qr){
				
				while ($result = mysql_fetch_array($qr)) {
				echo "<li onclick=\"fillG('".$result['nim']."');\">".$result['nim']."  (".$result['nama'].")"."</li>";
				}
		
			} else {echo "ERROR: Tidak ada data.";}
		
		}
	}
        
?>