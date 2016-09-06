<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>SIM UKM</title>
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

<div id="header">
	<div id="header-status">
		<div class="container_12">
			<div class="grid_8"><br><img src="images/header.jpg" width="570" height="100"> </div>
			<?php
			include "koneksi/koneksi.php";
			$dataExt = mysql_fetch_array(mysql_query("SELECT * FROM akun WHERE id_akun = '$_SESSION[id]'"));
			if ($_SESSION['level'] == '1'){
				$levelUser = 'Administrator';
			}
			elseif ($_SESSION['level']=='2'){
				$levelUser = 'UKM';
			}
			else{
				$levelUser = 'Super Admin';
			}
			?>
			<div class="grid_5">
				<div class="module">
					<div class="module-body">
                    <strong>User ID : </strong><?php echo $_SESSION['username']; ?><br>
						<strong>Login As :</strong> <?php echo $levelUser; ?>
						
						</td></tr>
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
	</div>
	<div id="header-main">
		<div class="container_12">
			<div class="grid_12">
				<div id="logo">
					<div id="menu">
						<ul class="menu">
							<li><a href="master.php"><span>Home</span></a></li>
							<li><a href=""><span>Input Data</span></a>
								<ul>
                                	<li><a href="?module=input_anggota"><span>Input Data Pengurus</span></a></li>
									<li><a href="?module=input_kegiatan"><span>Input Data Kegiatan</span></a></li>
                                    <li><a href="?module=subkegiatan"><span>Input Data Sub-Kegiatan</span></a></li>
                                    <li><a href="?module=kepanitiaan"><span>Input Panitia Kegiatan</span></a></li>
									<li><a href="?module=input_rapat"><span>Input Data Rapat</span></a></li>
                                    <li><a href="?module=input_sponsor"><span>Input Sponsor</span></a></li>
                                    <li><a href="?module=proposal"><span>Input Proposal</span></a></li>
                                    <li><a href="?module=input_surat"><span>Input Surat</span></a></li>
                                    <li><a href="?module=dokumentasi"><span>Dokumentasi</span></a></li>
                                    <li><a href="?module=status_kegiatan"><span>Status Kegiatan</span></a></li>
									<!-- <li><a href="?module=manajemen_jadwal_makul">Manajemen Jadwal Kuliah</a></li>-->
								</ul>
							</li>
							<li><a href=""><span>Laporan</span></a>
								<ul>
                                		<li><a href="?module=data_pengurus"><span>Data Pengurus</span></a></li>
                                    	<li><a href="?module=data_kegiatan"><span>Data Kegiatan</span></a></li>
                                        <li><a href="?module=data_subkegiatan"><span>Data Subkegiatan</span></a></li>
                                    	<li><a href="?module=data_rapat"><span>Data Rapat</span></a></li>
                                        <li><a href="?module=data_sponsor"><span>Data Sponsor</span></a></li>
                                        <li><a href="?module=data_proposal"><span>Data Proposal</span></a></li>
                                        <li><a href="?module=data_inventaris"><span>Data Inventaris</span></a></li>
                                        <li><a href="?module=data_pinjam"><span>Data Pinjam</span></a></li>
                                        <li><a href="?module=data_surat"><span>Data Surat</span></a></li>
      								</ul>
                                    </li>
                                    <li><a href=""><span>Inventaris</span></a>
                                    <ul>
                                    <li><a href="?module=inventaris"><span>Input Data</span></a></li>
                                    <li><a href="?module=pinjam"><span>Pinjam Barang</span></a></li>
                                    <li><a href="?module=kembali"><span>Kembali Barang</span></a></li>
                                    </ul>
                                    </li>
                                     <li><a href=""><span>Dokumentasi</span></a>
                                    <ul>
                                    <li><a href="?module=dokumentasi"><span>Input Dokumentasi</span></a></li>
                                    <li><a href="?module=data_dokumentasi"><span>Galeri Dokumentasi</span></a></li>
                                    
                                    </ul>
                                    </li>
                                    <li><a href=""><span>APBU</span></a>
                                    <ul>
                                    <li><a href="?module=apbu"><span>Pengajuan Anggaran APBU</span></a></li>
                                    <li><a href="?module=data_apbu"><span>Data APBU</span></a></li>
                                    
                                    </ul>
                                    </li>
                                    <li><a href=""><span>Bendahara</span></a>
                                    <ul>
                                    <li><a href="?module=input_pemasukan"><span>Dana Pemasukan</span></a></li>
							<li><a href="?module=input_pengeluaran"><span>Dana Pengeluaran</span></a></li>
                            <li><a href="?module=laporan_keuangan"><span>Laporan Keuangan</span></a></li>
                            
                           </ul>
                           </li>
                                    <li><a href="?module=lpj"><span>LPJ</span></a></li>
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
                	<p> &nbsp;&nbsp;&nbsp;&nbsp;&copy; 2015. <u>Agung Rifqi Hidayat</u></p>
        		</div>
            </div>
            <div style="clear:both;"></div>
        </div> <!-- End #footer -->
	</body>
</html>