<br>
<?php
// =========================== LEVEL USER : ADMINISTRATOR ============================================================//
if ($_SESSION['level'] == '1'){
	
?>

	<h2><span>Welcome to Administrator System</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<td>
					<script language="JavaScript">$d = new Date();$h=$d.getHours();if ($h < 11) { document.write('Selamat pagi '); }else { if ($h < 15) { document.write('Selamat siang '); }else { if ($h < 18) { document.write('Selamat sore '); }else { if ($h <= 23) { document.write('Selamat malam '); }}}}</script><b> <?php 
					$data = mysql_fetch_array(mysql_query("SELECT * FROM akun,admin WHERE akun.kd_admin=admin.kd_admin and akun.id_akun = '$_SESSION[id]'"));
					echo"$data[nama_admin]";?></b>, Selamat datang di halaman utama SIM UKM,
					Anda dapat mengolah segala aktifitas dalam sistem ini.. semua aktifitas yang Anda lakukan akan terekam dalam database.
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</td>
			</tr>
		</table>
		
		<table>
			<tr>
				<td>
					Date: <script language="JavaScript" src="jquery/almanak.js"></script><br />Jam: <script type="text/javascript">var currentTime = new Date();var hours = currentTime.getHours();var minutes = currentTime.getMinutes();var seconds = currentTime.getSeconds();if (minutes < 60){seconds = + seconds}document.write(hours + ":" + minutes + ":" + seconds);</script>
				</td>
			</tr>
		</table>
		<div style="clear: both"></div>
	</div> <!-- End .module-table-body -->
<?php
}
elseif ($_SESSION['level'] == '2'){
	
?>
	<h2><span>Welcome to UKM System</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<td>
					<script language="JavaScript">$d = new Date();$h=$d.getHours();if ($h < 11) { document.write('Selamat pagi '); }else { if ($h < 15) { document.write('Selamat siang '); }else { if ($h < 18) { document.write('Selamat sore '); }else { if ($h <= 23) { document.write('Selamat malam '); }}}}</script><b><?php 
					$data2 = mysql_fetch_array(mysql_query("SELECT * FROM akun,ukm WHERE akun.kd_ukm=ukm.kd_ukm and akun.id_akun = '$_SESSION[id]'"));
					echo"$data2[nama_ukm]"; ?></b>, Selamat datang di halaman utama sistem SIM UKM,
					Anda dapat mengolah segala aktifitas dalam sistem ini.. semua aktifitas yang Anda lakukan akan terekam dalam database.
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</td>
			</tr>
		</table>
		
		<table>
			<tr>
				<td>
					Date: <script language="JavaScript" src="jquery/almanak.js"></script><br />Jam: <script type="text/javascript">var currentTime = new Date();var hours = currentTime.getHours();var minutes = currentTime.getMinutes();var seconds = currentTime.getSeconds();if (minutes < 60){seconds = + seconds}document.write(hours + ":" + minutes + ":" + seconds);</script>
				</td>
			</tr>
		</table>
		<div style="clear: both"></div>
	</div> <!-- End .module-table-body -->
<?php
}
elseif ($_SESSION['level'] == '0'){
	

?>
<h2><span>Welcome to Super Admin System</span></h2>

	<div class="module-table-body">
		<table id="myTable" class="tablesorter">
			<tr>
				<td>
					<script language="JavaScript">$d = new Date();$h=$d.getHours();if ($h < 11) { document.write('Selamat pagi '); }else { if ($h < 15) { document.write('Selamat siang '); }else { if ($h < 18) { document.write('Selamat sore '); }else { if ($h <= 23) { document.write('Selamat malam '); }}}}</script><b>Super Admin</b>, Selamat datang di halaman utama sistem SIM UKM,
					Anda dapat mengolah segala aktifitas dalam sistem ini.. semua aktifitas yang Anda lakukan akan terekam dalam database.
					<p>&nbsp;</p>
					<p>&nbsp;</p>
					<p>&nbsp;</p>
				</td>
			</tr>
		</table>
		
		<table>
			<tr>
				<td>
					Date: <script language="JavaScript" src="jquery/almanak.js"></script><br />Jam: <script type="text/javascript">var currentTime = new Date();var hours = currentTime.getHours();var minutes = currentTime.getMinutes();var seconds = currentTime.getSeconds();if (minutes < 60){seconds = + seconds}document.write(hours + ":" + minutes + ":" + seconds);</script>
				</td>
			</tr>
		</table>
		<div style="clear: both"></div>
	</div> <!-- End .module-table-body -->
<?php
}
?>