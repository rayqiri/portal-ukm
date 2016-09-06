<?php

	include "../../koneksi/koneksi.php";
	include "../../fungsi/class_paging.php";
	include '../../fungsi/fungsi_indotgl.php';
$keg=$_GET['keg'];
$nama_keg=$_GET['nama'];
include"footer_cetak.php";
 ?>
 <body onLoad="javascript:window.print()";><br \>
  
<div style="padding-left:50px; padding-right:50px;">
    <hr style="border: 1px solid #000;">
    </div>
<br>

<div style="padding:10px;">
							<h3><center><b>DATA PANITIA KEGIATAN <?php echo"$nama_keg";?></b></center></h3>
                            <table width="40%" border="1" cellpadding="2" cellspacing="0" align="center">
                            <?php
                            $sql=mysql_query("select * from kepanitiaan where id='$keg'");
$ada=mysql_fetch_array($sql);

echo"
		<tr><th align='left' class='cetak' style='width:20%'>Ketua</td>         <td class='cetak'>$ada[ketua]</td></tr>
        <tr><th align='left' class='cetak' style='width:20%'>Sekretaris</td>        <td class='cetak'>$ada[sekretaris]</td></tr>
        <tr><th align='left' class='cetak' style='width:20%'>Bendahara</td>      <td class='cetak'>$ada[bendahara]</td></tr>
		<tr><th align='left' class='cetak' style='width:20%'>Koordinator 1</td>      <td class='cetak'>$ada[koordinator1]</td></tr>
        <tr><th align='left' class='cetak' style='width:20%'>Koordinator 2</td>    <td class='cetak'>$ada[koordinator2]</td></tr>
        <tr><th align='left' class='cetak' style='width:20%'>Koordinator 3</td>       <td class='cetak'>$ada[koordinator3]</td></tr>
        <tr><th align='left' class='cetak' style='width:20%'>Koordinator 4</td>      <td class='cetak'>$ada[koordinator4]</td></tr>

</table>
";
?>
<table width="50%" border="0" align="center">
            <tr>
              <td width="14%">&nbsp;</td>
              <td width="55%">&nbsp;</td>
              <td width="31%">&nbsp;</td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center">Ketua</td>
              <td align="center">Sekretaris</td>
            </tr>
            <tr>
              <td height="52">&nbsp;</td>
              <td>&nbsp;</td>
              <td id="tt">&nbsp;  </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td align="center">(..........................)</td>
              <td align="center">(..........................)</td>
            </tr>
          </table> 