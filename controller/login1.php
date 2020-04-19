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
	

</head>
<body>
	
	<div class="limiter">

		<div class="container-login100">

			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<h1><center>Chào mừng bạn đến với website bán đồ ăn vặt</center></h1>
				<form class="login100-form validate-form" method="POST">

					<span class="login100-form-title p-b-55">
						Login
					</span>

					<div class="wrap-input100 validate-input m-b-16"  data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="id" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-user"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>
					
					<div class="container-login100-form-btn p-t-25">
					<button  class="login100-form-btn"  name="name">
							Login 
						</button>


					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>

						<a class="txt1 bo1 hov1" href="fromDangky.php">
							Sign up now							
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	


</body>
</html>


<?php
            $servername = "127.0.0.1";
            $database = "nlcs";
            $username = "root";
            $password = "";
            // Create connection
            $conn = new mysqli($servername, $username, $password, $database);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            if(isset($_POST["name"])){
	             $sql = "select * from admin  where ad_id = '" . $_POST['id'] . "' and ad_matkhau ='" . $_POST['pass'] . "';";
	             $sql1 = "select * from khachhang  where kh_id = '" . $_POST['id'] . "' and kh_matkhau ='" . $_POST['pass'] . "';";
	             $username = $_POST['id'];
	             $password = $_POST['pass'];

	             $result = $conn->query($sql);

	             $result1 = $conn->query($sql1);
	             $row11 = $result1->fetch_assoc();
	            if($result->num_rows>0){
	            	$_SESSION['username'] = $username;
	            	$_SESSION['password'] =  $password;
	            	$_SESSION['quyen'] =1;
	            	$_SESSION['kh_ma'] = $row11['KH_MA'];
	           		header("Location: ../pages/index.php");
	                echo "<meta http-equiv='refresh' content='1;url=../pages/index.php'>";

	                echo "dang nhap thanh cong";


	            } else if($result1->num_rows>0){
            		$_SESSION['username'] = $username;
	            	$_SESSION['password'] =  $password;
	            	$_SESSION['quyen']=0 ;
	            	$_SESSION['kh_ma'] = $row11['KH_MA'];

           		    header("Location: ../pages/index.php");
           			echo "dang nhap thanhh cong";
            } else {
	            	echo "dang nhap that bai";
	            }
        	}

            mysqli_close($conn);
    ?>
