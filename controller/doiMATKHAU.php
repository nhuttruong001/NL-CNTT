<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V11</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>

	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="../template/Login_v11/css/util.css">
	<link rel="stylesheet" type="text/css" href="../template/Login_v11/css/main.css">
	<script src="https://kit.fontawesome.com/7d670cfbb0.js"></script>

</head>
<body>


	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" action="" method="POST" enctype="multipart/form-data">
					<span class="login100-form-title p-b-55">
						ĐỔI MẬT KHẨU
					</span>
					<h5>Tài khoản</h5>

					<div  class="wrap-input100 validate-input m-b-16"  data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="id" value="<?php echo $_SESSION['username']; ?>" placeholder="Tai Khoan">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fas fa-user mt-4"></i>	
						</span>
					</div>
					<h5>Nhập lại mật khẩu cũ</h5>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="text" name="pass" placeholder="Password cu" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fas fa-lock"></i>	
						</span>
					</div>
					<h5>Nhập mật khẩu mới</h5>
						<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="text" name="pass1"  placeholder="Password moi" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fas fa-lock"></i>	
						</span>
					</div>
					<h5>Nhập lại mật khẩu mới</h5>
					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="text" name="pass2" placeholder="Nhap lai Password moi" required="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fas fa-lock"></i>	
						</span>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
						<button  class="login100-form-btn"  name="submit">
							Submit
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	

</body>


</html>

<?php
		include "connectMYSQL.php";


		if(isset($_POST["submit"])){

			$err = [];

			$loaiUser = 0; // 0 la sai mat khau hoac username
			$sql_check = "SELECT * FROM Admin where ad_id='".$_POST['id']."' and ad_matkhau='".$_POST['pass']."'";
			$is_admin = $conn->query($sql_check);
			if(mysqli_num_rows($is_admin)>0) $loaiUser =1; // 1 la admin

			$sql_check = "SELECT * FROM Khachhang where kh_id='".$_POST['id']."' and kh_matkhau='".$_POST['pass']."'";
			$is_customer = $conn->query($sql_check);
			if(mysqli_num_rows($is_customer)>0) $loaiUser =2; // 2 la customer

			if($loaiUser ==0) array_push($err, "Sai username hoac password");

			if($_POST["pass1"] != $_POST["pass2"]){
				array_push($err, "Mat khau khong khop");
			}

			if (count($err)>0){
				foreach($err as $e){
					echo $e;
				}
			} else{
				if($loaiUser==1){
					$sql = "update Admin set ad_matkhau='".$_POST['pass1']."' where ad_id='".$_POST['id']."'";
					$result = $conn->query($sql);
					echo 'Doi mat khau admin thanh cong ';
					echo "<meta http-equiv='refresh' content='1;url=../controller/login1.php'>";
				} else {
					$sql1 = "update khachhang set kh_matkhau='".$_POST['pass1']."' where kh_id='".$_POST['id']."'";
					$result1 = $conn->query($sql1);
					echo 'Doi mat khau khach hang thanhcong';
					echo "<meta http-equiv='refresh' content='1;url=../controller/login1.php'>";
				}
			}		

		}

		 mysqli_close($conn);


?>




                  