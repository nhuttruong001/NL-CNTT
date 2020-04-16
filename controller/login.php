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

	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-77 p-b-30">
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title p-b-55">
						Login
					</span>


					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="ma" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-code"></span>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="id" placeholder="Email">
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

					<!-- <div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div> -->
					
					<div class="container-login100-form-btn p-t-25">
					<button  class="login100-form-btn"  name="khachhang">
							Login 
						</button>

				<!-- 	<div class="text-center w-full p-t-42 p-b-22">
						<span class="txt1">
							Or login with
						</span>
					</div>
 -->
					<div class="container-login100-form-btn p-t-25">
						<button  class="login100-form-btn"  name="admin">
							Login admin
						</button>
					</div>

					<div class="text-center w-full p-t-115">
						<span class="txt1">
							Not a member?
						</span>

						<a class="txt1 bo1 hov1" href="#">
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
	$servername = '127.0.0.1';
	$username = 'root';
	$password = '';
	$database = 'nlcs';

	$conn = mysqli_connect($servername,$username,$password,$database);

	if(!$conn){
		die("Connect flaied ".mysql_connect_error());
	}

	if(isset($_POST["khachhang"])){
		$_SESSION["username"] = $_POST['id'];
		$_SESSION["password"] = $_POST['pass'];
		header('Location: login_.php');
	}

	if(isset($_POST["admin"])){
		$_SESSION["username"] = $_POST['id'];
		$_SESSION["password"] = $_POST['pass'];
		header('Location: loginAdmin_.php');
	}

?>


