<?php
session_start();
include "../../koneksi/koneksi.php";
$act 	= $_GET[act];
$modul 	= $_GET[module];

if ($modul == 'manajemen_user' AND $act == 'input'){
	if (empty($_POST[NIP]) || empty($_POST[Username]) || empty($_POST[Password]) || empty($_POST[Level]) || empty($_POST[Email]) || empty($_POST[Aktif])){
		echo "<script language='javascript'>alert('Isikan form user secara lengkap (Tanda *)');
			  window.location = '../../master.php?module=manajemen_user&act=tambahuser'</script>";
	}
	elseif ($_POST[PendidikanTerakhir] == '++' OR $_POST[Agama] == '++'){
		echo "<script language='javascript'>alert('Isikan Agama dan Pendidikan Terakhir');
			  window.location = '../../master.php?module=manajemen_user&act=tambahuser'</script>";
	}
	else{
		$numRowsUsername = mysql_num_rows(mysql_query("SELECT Username FROM tuser WHERE Username = '$_POST[Username]'"));
		$numRowsNIP		 = mysql_num_rows(mysql_query("SELECT NIP FROM tuser WHERE NIP = '$_POST[NIP]'"));
		if ($numRowsUsername > 0){
			echo "<script language='javascript'>alert('Username sudah digunakan, gunakan username lain.');
					window.location = '../../master.php?module=manajemen_user&act=tambahuser'</script>";
		}
		elseif ($numRowsNIP > 0){
			echo "<script language='javascript'>alert('NIP sudah digunakan, gunakan nip lain.');
					window.location = '../../master.php?module=manajemen_user&act=tambahuser'</script>";
		}
		else{
			$createdDate = date('Y-m-d H:i:s');
			$passwordEnkrip = md5($_POST[Password]);
			mysql_query("INSERT INTO tuser( NIP,
											NamaLengkap,
											Alamat,
											Telepon,
											CellPhone,
											Agama,
											Email,
											Aktif,
											Level,
											Username,
											Password,
											IdPendidikanTerakhir,
											CreatedDate,
											CreatedUser)
									VALUES ('$_POST[NIP]',
											'$_POST[NamaLengkap]',
											'$_POST[Alamat]',
											'$_POST[Telepon]',
											'$_POST[CellPhone]',
											'$_POST[Agama]',
											'$_POST[Email]',
											'$_POST[Aktif]',
											'$_POST[Level]',
											'$_POST[Username]',
											'$passwordEnkrip',
											'$_POST[PendidikanTerakhir]',
											'$createdDate',
											'$_SESSION[IdUser]')");
			
			echo "<script language='javascript'>alert('User $_POST[NamaLengkap] dengan NIP = $_POST[NIP] berhasil ditambahkan / disimpan');
				window.location = '../../master.php?module=manajemen_user'</script>";
		}
	}
}

elseif ($modul == 'manajemen_user' AND $act == 'update'){
	$idUser = $_POST[IdUser];
	if (empty($_POST[NamaLengkap]) || empty($_POST[Level]) || empty($_POST[Email]) || empty($_POST[Aktif])){
		echo "<script language='javascript'>alert('Isikan form user secara lengkap (Tanda *)');
			  window.location = '../../master.php?module=manajemen_user&act=edit_user&id=$idUser'</script>";
	}
	elseif ($_POST[PendidikanTerakhir] == '++' OR $_POST[Agama] == '++'){
		echo "<script language='javascript'>alert('Isikan Agama dan Pendidikan Terakhir');
			  window.location = '../../master.php?module=manajemen_user&act=edit_user&id=$idUser'</script>";
	}
	else{
		$updateDate = date('Y-m-d H:i:s');
		mysql_query("UPDATE tuser SET 	NamaLengkap = '$_POST[NamaLengkap]',
										Alamat		= '$_POST[Alamat]',
										Telepon		= '$_POST[Telepon]',
										CellPhone	= '$_POST[CellPhone]',
										Agama		= '$_POST[Agama]',
										Email		= '$_POST[Email]',
										Aktif		= '$_POST[Aktif]',
										Level		= '$_POST[Level]',
										IdPendidikanTerakhir = '$_POST[PendidikanTerakhir]',
										LastUpdateDate = '$updateDate',
										LastUpdateUser = '$_SESSION[IdUser]'
									WHERE IdUser = '$idUser'");
			
		echo "<script language='javascript'>alert('User $_POST[NamaLengkap] berhasil diupdate');
				window.location = '../../master.php?module=manajemen_user'</script>";
	}
}

elseif ($modul == 'manajemen_user' AND $act == 'hapus_user'){
	mysql_query("DELETE FROM tuser WHERE IdUser = '$_GET[id]'");
	header('location: ../../master.php?module=manajemen_user');
}
?>