<?php
	$servername = '127.0.0.1';
	$username = 'root';
	$password = '';
	$database = 'nlcs';

	$conn = mysqli_connect($servername,$username,$password,$database);

	if(!$conn){
		die ("Connect failed :".mysqli_connect_error());
	}

	$sql = "delete from khachhang where kh_ma='".$_GET['kh_ma']."';";
									

	$query = mysqli_query($conn,$sql);

	if($query){
		echo "Xóa khách hàng thành công";
		 echo "<meta http-equiv='refresh' content='1;url=../pages/xoaKHACHHANGHOME.php'>";
	}else
	{
		echo "Xóa khách hàng thất bại";
			 echo "<meta http-equiv='refresh' content='1;url=../pages/xoaKHACHHANGHOME.php'>";
	}
?>