<?php
	include "connectMYSQL.php";

	$sql = "insert into khachhang(kh_id,kh_matkhau,kh_ten,kh_gioitinh,kh_diachi,kh_sdt)
			values('".$_POST['kh_id1']."','".$_POST['kh_matkhau1']."','".$_POST['kh_ten1']."','".$_POST['kh_gioitinh1']."',
			'".$_POST['kh_diachi1']."','".$_POST['kh_sdt1']."'); ";

	

	 $result = mysqli_query($conn,$sql);

	 if($result){
	 	echo "Thêm khách hàng thành công";
	 	 echo "<meta http-equiv='refresh' content='2;url=../pages/themKHACHHANGHOME.php'>";
	 }else
	 {
	 	echo "Thêm khách hàng thất bại";
	 	 echo "<meta http-equiv='refresh' content='2;url=../pages/formthemKHACHHANG.php'>";
	 }