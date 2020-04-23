<?php
	session_start();
?>

<?php
	include "../controller/connectMYSQL.php";

	 // if(isset($_POST["submit"])){

	$sql = "insert into khachhang(kh_id,kh_matkhau,kh_ten,kh_gioitinh,kh_diachi,kh_sdt)
			values('".$_POST['kh_id']."','".$_POST['kh_matkhau']."'
			,'".$_POST['kh_ten']."','".$_POST['kh_gioitinh']."'
			,'".$_POST['kh_diachi']."','".$_POST['sdt']."');"; 
	
	// $sql1 = "select * from khachhang  where kh_id = '" . $_POST['kh_id'] . "' and kh_matkhau ='" . $_POST['kh_matkhau'] . "';";

  	// $new_username =$_POST['kh_id'] ;

   
	$result = mysqli_query($conn,$sql);
		
    // $result1 = mysqli_query($conn,$sql1);

   /*if($result->num_rows>0){
   
    	$_SESSION['new_username'] = $new_username;
	


	 if(($_SESSION['new_username']) == ($_SESSION['username'])){
	 		echo "Tài khoảng đã có người đăng ký rồi!!!!";
	 	echo "<meta http-equiv='refresh' content='2;url=./fromDangky.php'>";
	 	}
	 }*/

	  if($result){
	 	echo "Đăng ký tài khoảng thành công";
	 	echo "<meta http-equiv='refresh' content='2;url=../controller/login1.php'>";
	 }else

	 {
	  	echo "Đăng ký tài khoảng thất bại";
	 	echo "<meta http-equiv='refresh' content='2;url=../pages/fromDangky.php'>";
	   }


?>