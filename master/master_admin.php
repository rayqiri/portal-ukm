<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title> SIM UKM</title>
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/grid.css" type="text/css">
	<link rel="stylesheet" href="css/styles.css" type="text/css">
	<link rel="stylesheet" href="css/menu.css" type="text/css"> 
	<link rel="stylesheet" href="css/paging.css" type="text/css"> 
	<link rel="shortcut icon" href="images/favicon.jpg" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<meta http-equiv="Copyright" content="UMK">
	<meta name="Author" content="Agung">
</head>

<body>

<div id="header">
	<div id="header-status">
		<div class="container_12">
			<div class="grid_8"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/header.jpg" width="570" height="100"></div>
			<?php
			include "koneksi/koneksi.php";
			$dataExt = mysql_fetch_array(mysql_query("SELECT id_akun FROM akun WHERE id_akun = '$_SESSION[id]'"));
			if ($_SESSION['level'] == '1'){
				$levelUser = 'Administrator';
			}
			elseif ($_SESSION['level']=='2'){
				$levelUser = 'UKM';
			}
			?>
			<div class="grid_4">
				<div class="module">
					<div class="module-body">
						<strong>User ID : </strong><?php echo $_SESSION['username']; ?><br>
						<strong>Login As :</strong> <?php echo $levelUser; ?>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	
	<div id="header-main">
		<div class="container_12">
			<div class="grid_12">
				<div id="logo">
					<div id="menu">
						<ul class="menu">
							<li><a href="master.php"><span>Home</span></a></li>
                            <li><a href="?module=data_ukm"><span>UKM</span></a></li>
							
									<li><a href="?module=kegiatan"><span>Kegiatan</span></a></li>
                                    
                                    <li><a href=""><span>APBU</span></a>
                                    <ul>
                                    <li><a href="?module=data_apbu"><span>Data APBU</span></a></li>
                                    <li><a href="?module=proses_apbu"><span>Proses APBU</span></a></li>
                                    </ul>
                                    </li>
                                    <li><a href="?module=ubah_password"><span>Ubah Password</span></a></li>
                                    
                                    
							<li class="last"><span><a href="logout.php" onClick="return confirm('Anda Yakin Logout dari Sistem?')">Logout</a></span></li>
						</ul>
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
		</div>
	</div>
	<div style="clear: both;"></div>
</div>



<div class="container_12">
	
	<div style="clear:both;"></div>
	
	<div class="grid_12">
        
		<!-- Example table -->
		<div class="module">
			<?php include "konten.php"; ?>
		</div> <!-- End .module -->
	</div>
</div> <!-- End .container_12 -->
		
           
        <!-- Footer -->
        <div id="footer">
        	<div class="container_12">
            	<div class="grid_12">
                	<!-- You can change the copyright line for your own -->
                	<p> &nbsp;&nbsp;&nbsp;&nbsp;&copy; 2012. <u>Agung Rifqi Hidayat</u></p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>