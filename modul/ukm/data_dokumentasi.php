<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link type="text/css" href="js/fancybox/jquery.fancybox.css" rel="stylesheet" /> 
<link type="text/css" href="js/style.css" rel="stylesheet" /> 
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/tooltip.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="js/fancybox/jquery.mousewheel.js"></script>
</head>
<body>
<div>
	<h1>Galeri Kegiatan</h1>
	<p>
	<?php 
	echo "<ul id='produk'>";
	$ukm=$_SESSION['ukm'];
	$QKategori	= mysql_query("SELECT * FROM kegiatan where kd_ukm='$ukm'");
	
	while ($AKategori = mysql_fetch_array($QKategori)) {
		$Kategori = $AKategori['id'];
							
		$QGetNamaKategori	= mysql_query("SELECT nama_kegiatan FROM kegiatan WHERE id = '$Kategori'");
		$AGetNamaKategori	= mysql_fetch_array($QGetNamaKategori);
		
		$QJumlahPerKategori = mysql_query("SELECT photo FROM kegiatan WHERE id = '$Kategori'");
		$JJumlahPerKategori = mysql_num_rows($QJumlahPerKategori);
		
		$QGaleri 	= mysql_query("SELECT * FROM kegiatan WHERE id = '$Kategori' ORDER BY RAND()");
		$AGaleri	= mysql_fetch_array($QGaleri);
	
		if ($JJumlahPerKategori == 0) {
			echo "
			<a href='#' onclick=\"javascript:alert('belum ada foto ..!')\" class='tooltip' title='$AGetNamaKategori[id]'>
				<li class='lis-produk-depan'>
					<div class='isi'><img src='dokumentasi/no-image.jpg'></div>
				</li>
			</a>";
		} else {
			echo "
			<a href='?module=galeri_detil&kat=$Kategori' class='tooltip' title='$AGetNamaKategori[id]'>
				<li class='lis-produk-depan'>$AGaleri[nama_kegiatan]
					<div class='isi'><img src='kegiatan/$AGaleri[photo]'></div>
				</li>
			</a>";
		}
	}
	echo "</ul>";
	?>
	</p>
</div>

</body>
</html>