<?php
mysql_query("DELETE FROM bendahara WHERE id_bendahara = '$_GET[id]'");

	echo"<script language='javascript'>window.location ='../master.php?module=laporan_keuangan'</script>";
?>