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

		echo "Xóa món ăn thành công";
		echo "<meta http-equiv = 'refresh' content = '1; url =../pages/xoaHome1.php' />";
	}else
	{
		echo "Xóa món ăn thất bại";
		echo "<meta http-equiv = 'refresh' content = '1; url =../pages/xoaHome1.php' />";

	}

	mysqli_close($conn);




?>