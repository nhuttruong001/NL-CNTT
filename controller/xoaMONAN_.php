<?php
	$servername = '127.0.0.1';
	$database = 'nlcs';
	$username = 'root';
	$password = '';

	$conn = mysqli_connect($servername,$username,$password,$database);

	if(!$conn){
		die("Connect failed :".mysqli_connect_error());
	}

	$sql = "delete from monan where monan_ma = '".$_GET['monan_ma']."';";

	$query = mysqli_query($conn,$sql);

	if($query){

		echo "Xoa thanh cong";
		echo "<meta http-equiv='refresh' content='2;url=../pages/xoaHome1.php'>";
	}else
	{
		echo "Xoa that bai";
		echo "<meta http-equiv='refresh' content='2;url=../pages/xoaHome1.php'>";

	}

	mysqli_close($conn);




?>