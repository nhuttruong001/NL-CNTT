<?php 
	$servername = '127.0.0.1';
	$username = 'root';
	$password = '';
	$database = 'nlcs';

	$conn = mysqli_connect($servername,$username,$password,$database);
	$conn->set_charset("utf8");

	if(!$conn){
		die ("Connect failed :".mysqli_connect_error());
	}
?>