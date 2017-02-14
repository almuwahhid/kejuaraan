<?php
	$host		= "localhost";
	$user		= "root";
	$pass		= "";
	$database = 'kejuaraan';

	$h = mysqli_connect($host,$user,$pass,$database);
	mysqli_select_db($h,$database);
?>
