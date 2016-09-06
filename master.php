<?php
session_start();
if (empty($_SESSION[username]) and empty($_SESSION[password]) and empty($_SESSION[level])){
	header('location: index.php');
	
}
else{
if ($_SESSION[level] == '1'){
		include "master/master_admin.php";
	}
	elseif ($_SESSION[level] == '2'){
		include "master/master_ukm.php";
	}
	else {
		include "master/master_supmin.php";
	}

}
?>