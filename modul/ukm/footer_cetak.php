<?php
$ada=mysql_fetch_array(mysql_query("select * from ukm where kd_ukm='$_SESSION[ukm]'"));
 ?>
<link rel="stylesheet" type="text/css" href="../../css/stylesheet/stylesheet.css">

<table  width="100%"  border="0"  cellpadding="1"  cellspacing="0" >
		<tr><td rowspan="4" align="right" width="30%"><img src="../../images/umk.png" width="130" height="70">&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td bordercolor="#FFFFFF" width="40%"> <div align="center"><font size="+2" face="Arial Black, Gadget, sans-serif"><?php echo"$ada[nama_full]";?></font></div> </td>
            
            <td rowspan="4" align="left" width="30%">&nbsp;&nbsp;&nbsp;&nbsp;<img src="<?php echo"../../ukm/$ada[logo]";?>" width="130" height="70"></td>
		</tr>
       
	<tr>
			<td bordercolor="#FFFFFF" width="40%"><div align="center" ><font size="+2" face="Arial Black, Gadget, sans-serif">Universitas Muria Kudus</font></font></div> </td>
		</tr>
        <tr>
			<td bordercolor="#FFFFFF" width="40%"><div align="center" ><font face="Trebuchet MS, Arial, Helvetica, sans-serif" size="+1"><?php echo"$ada[alamat]";?></font></div> </td>
		</tr>
        
        
		
	
	</table>