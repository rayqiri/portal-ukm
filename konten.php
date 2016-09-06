<?php
session_start();
include "koneksi/koneksi.php";
include "fungsi/fungsi_indotgl.php";
//nama file: index.php
//$page = isset($_GET['page']) ? $_GET['page'] : null;
//atau:
//$page = isset($_GET['page']) ? $_GET['page'] : false;
//atau bisa juga dengan:
//$page = isset($_GET['page']) ? $_GET['page'] : "";
$module = $_GET['module'];

// Login ukm//
if ($_SESSION['level'] == '2'){
	// bagian input data mahasiswa
	if ($module == 'input_kegiatan'){
		include "modul/ukm/input.php";
	}
	elseif ($module == 'inventaris'){
		include "modul/ukm/inventaris.php";
	}
	elseif ($module == 'lpj'){
		include "modul/ukm/lpj.php";
	}
	elseif ($module == 'data_inventaris'){
		include "modul/ukm/data_inventaris.php";
	}
	elseif ($module == 'pinjam'){
		include "modul/ukm/pinjam.php";
	}
	elseif ($module == 'kembali'){
		include "modul/ukm/kembali.php";
	}
	elseif ($module == 'data_pinjam'){
		include "modul/ukm/data_pinjam.php";
	}
	elseif ($module == 'data_pengurus'){
		include "modul/ukm/data_pengurus.php";
	}
	elseif ($module == 'data_surat'){
		include "modul/ukm/data_surat.php";
	}
	elseif ($module == 'input_sponsor'){
		include "modul/ukm/input_sponsor.php";
	}
	elseif ($module == 'data_sponsor'){
		include "modul/ukm/data_sponsor.php";
	}
	elseif ($module == 'input_surat'){
		include "modul/ukm/surat.php";
	}
	elseif ($module == 'input_anggota'){
		include "modul/ukm/input_anggota.php";
	}
	
	elseif ($module == 'input_rapat'){
		include "modul/ukm/input_rapat.php";
	}
	
	elseif ($module == 'data_rapat'){
		include "modul/ukm/data_rapat.php";
	}
	elseif ($module == 'data_kegiatan'){
		include "modul/ukm/data_kegiatan.php";
	}
	elseif ($module == 'hasil_rapat'){
		include "modul/ukm/hasil_rapat.php";
	}
	elseif ($module == 'manajemen_user'){
		include "modul/ukm/manajemen_user.php";
	}
	elseif ($module == 'reset_password'){
		include "modul/ukm/ubah_password.php";
	}
	elseif ($module == 'status_kegiatan'){
		include "modul/ukm/status_kegiatan.php";
	}
	elseif($module == 'input_pemasukan'){
		include "modul/ukm/pemasukan.php";
	}
	
	elseif ($module == 'input_pengeluaran'){
		include "modul/ukm/pengeluaran.php";
	}
	elseif ($module == 'laporan_keuangan'){
		include "modul/ukm/laporan.php";
	}
	elseif ($module == 'dokumentasi'){
		include "modul/ukm/dokumentasi.php";
	}
	elseif ($module == 'ajaxpanitia'){
		include "modul/ukm/ajaxpanitia.php";
	}
	elseif ($module == 'proposal'){
		include "modul/ukm/proposal.php";
	}
	elseif ($module == 'subkegiatan'){
		include "modul/ukm/subkegiatan.php";
	}
	elseif ($module == 'kepanitiaan'){
		include "modul/ukm/kepanitiaan.php";
	}
	elseif ($module == 'data_proposal'){
		include "modul/ukm/data_proposal.php";
	}
	elseif ($module == 'data_subkegiatan'){
		include "modul/ukm/data_subkegiatan.php";
	}
	elseif ($module == 'data_dokumentasi'){
		include "modul/ukm/data_dokumentasi.php";
	}
	elseif ($module == 'galeri_detil'){
		include "modul/ukm/galeri_detil.php";
	}
	elseif ($module == 'apbu'){
		include "modul/ukm/apbu.php";
	}
	elseif ($module == 'data_apbu'){
		include "modul/ukm/data_apbu.php";
	}
	elseif ($module == 'nim_show'){
		include "modul/ukm/nim_show.php";
	}
	elseif ($module == 'detil'){
		include "modul/ukm/detil.php";
	}
	elseif ($module == 'progdi'){
		include "modul/ukm/ajax_progdi.php";
	}
	elseif ($module == 'ubah_password'){
		include "modul/ukm/ganti_password.php";
	}
	elseif ($module == 'data_materialsponsor'){
		include "modul/ukm/material_sponsor.php";
	}
	elseif ($module == 'edit_dokumentasi'){
		include "modul/ukm/edit_dokumentasi.php";
	}
	elseif ($module == 'hapus_dokumentasi'){
		include "modul/ukm/hapus_dokumentasi.php";
	}
	elseif ($module == 'edit_keuangan'){
		include "modul/ukm/edit_keuangan.php";
	}
	elseif ($module == 'hapus_keuangan'){
		include "modul/ukm/hapus_keuangan.php";
	}
	elseif ($module == 'data_panitia'){
		include "modul/ukm/data_panitia.php";
	}
	else{
		include "modul/mod_home/home.php";
	}
	
}

// Login Staff //
elseif ($_SESSION['level'] == '1'){
	// bagian manajemen dosen
	if ($module == 'profil_admin'){
		include "modul/admin/profil_admin.php";
	}
	elseif ($module == 'akun_ukm'){
		include "modul/admin/ukm.php";
	}
	elseif ($module == 'akun_admin'){
		include "modul/admin/admin.php";
	}
	elseif ($module == 'manajemen_user'){
		include "modul/admin/manajemen_user.php";
	}
	elseif ($module == 'kegiatan'){
		include "modul/admin/kegiatan.php";
	}
	elseif ($module == 'keuangan'){
		include "modul/admin/keuangan.php";
	}
	elseif ($module == 'edit_ukm'){
		include "modul/admin/edit_ukm.php";
	}
	elseif ($module == 'edit_admin'){
		include "modul/admin/edit_admin.php";
	}
	elseif ($module == 'proses_apbu'){
		include "modul/admin/proses_apbu.php";
	}
	elseif ($module == 'data_apbu'){
		include "modul/admin/data_apbu.php";
	}
	elseif ($module == 'hapus_apbu'){
		include "modul/admin/hapus_apbu.php";
	}
	elseif ($module == 'reset_password'){
		include "modul/admin/ubah_password.php";
	}
	elseif ($module == 'ubah_password'){
		include "modul/admin/ganti_password.php";
	}
	elseif ($module == 'data_ukm'){
		include "modul/admin/data_ukm.php";
	}
	elseif ($module == 'data_anggota'){
		include "modul/admin/data_pengurus.php";
	}
	else{
		include "modul/mod_home/home.php";
	}
}
elseif ($_SESSION['level'] == '0'){
	// bagian manajemen dosen
	if ($module == 'manajemen_user'){
		include "modul/supmin/manajemen_user.php";
	}
	elseif ($module == 'akun_ukm'){
		include "modul/supmin/akun.php";
	}
	elseif ($module == 'ukm'){
		include "modul/supmin/ukm.php";
	}
	elseif ($module == 'data_ukm'){
		include "modul/supmin/data_ukm.php";
	}
	elseif ($module == 'akun_admin'){
		include "modul/supmin/admin.php";
	}
	elseif ($module == 'hapus_akun'){
		include "modul/supmin/hapus_akun.php";
	}
	elseif ($module == 'edit_akun'){
		include "modul/supmin/edit_akun.php";
	}
	elseif ($module == 'reset_akun'){
		include "modul/supmin/reset_akun.php";
	}
	elseif ($module == 'ubah_password'){
		include "modul/supmin/ganti_password.php";
	}
	else{
		include "modul/mod_home/home.php";
	}
}

// Tidak Mempunyai Hak Akses
else{
	echo "<script language='javascript'>alert('Anda tidak mempunyai hak akses memasuki halaman ini.');
			window.location = 'master.php'</script>";
}
?>