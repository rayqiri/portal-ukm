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
<?php
$ukm=$_SESSION['ukm'];
$Kategori = $_GET['kat'];
$nKategori = mysql_fetch_array(mysql_query("SELECT * FROM dokumentasi,kegiatan where dokumentasi.id=kegiatan.id and dokumentasi.id = '$Kategori' and dokumentasi.kd_ukm='$ukm'"));
?>

<div>
	<h1>Album Kegiatan | <?php echo $nKategori['nama_kegiatan']; ?></h1>
	<p>
<div id="gallery" class="ad-gallery">
      <div class="ad-image-wrapper"></div>
      <div class="ad-controls"></div>
      
	  <center>
	  <div class="ad-nav">
        <div class="ad-thumbs">
          	<ul id="produk">
			<?php
			$QGaleri = mysql_query("SELECT * FROM dokumentasi WHERE id = '$Kategori'");
			while ($AGaleri = mysql_fetch_array($QGaleri)) {
			?>
			<li class="lis-produk">
			<h3><?=$AGaleri['keterangan']?></h3>
			<a class="fancybox" href="<?php echo "dokumentasi/$AGaleri[dokumentasi]";?>" data-fancybox-group="gallery" title="<?=$AGaleri['keterangan']?>">
				<img src="<?php echo"dokumentasi/".$AGaleri['dokumentasi'];?>" alt="" width="250" height="150">
			</a><a href="?module=edit_dokumentasi&id=<?php echo $AGaleri['kd_dokumentasi'];?>"><input type="button" value="EDIT" /></a><a href="?module=hapus_dokumentasi&id=<?php echo $AGaleri['kd_dokumentasi'];?>"onClick="return confirm('Anda yakin ingin menghapus foto <?php echo $AGaleri['keterangan']; ?>?');"><input type="button" value="HAPUS" /></a>
			</li>
            <?php } ?>
          </ul>
        </div>
      </div>
	  </center>
</div>
</p>
</div>
</body>
</html>



