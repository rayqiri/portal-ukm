<?php
session_start();


$server="localhost";
$user="portalukm";
$password="ukmukm15";
$db="portalukm";

mysql_connect($server,$user,$password)
or die("server tidak terhubung");
mysql_select_db($db)
or die("database tidak terhubung");
?>
