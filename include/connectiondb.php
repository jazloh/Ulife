<?php
	$dbname = "chlevent";
	$globaldb = mysql_connect("localhost","root","") or die("Couldn't make connection.");
	$chooseDB = mysql_select_db($dbname, $globaldb) or die("Couldn't select database");
	date_default_timezone_set('Asia/Brunei');
?>