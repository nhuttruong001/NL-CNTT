<?php
	include "connectMYSQL.php";

	$sql = "update khachhang set kh_ma='".$_POST['kh_ma']."',kh_id='".$_POST['kh_id1']."',kh_matkhau='".$_POST['kh_matkhau1']."',
									kh_ten='".$_POST['kh_ten1']."',
									kh_gioitinh='".$_POST['kh_gioitinh1']."',kh_diachi='".$_POST['kh_diachi1']."',
									kh_sdt='".$_POST['kh_sdt1']."' where kh_ma='".$_POST['kh_ma']."';";
									

	$query = mysqli_query($conn,$sql);

	if($query){
		echo "cập nhật thành công";
		 echo "<meta http-equiv='refresh' content='2;url=./capnhatKHACHHANGHOME.php'>";
	}else
	{
		echo "cập nhật thất bại";
			echo "<meta http-equiv='refresh' content='2;url=./formcapnhatKHACHHANG.php'>";
	}
?>