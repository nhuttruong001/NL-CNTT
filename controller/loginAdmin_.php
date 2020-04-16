<?php
			session_start();
			$servername = "127.0.0.1";
			$database = "nlcs";
			$username = "root";
			$password = "";
			// Create connection
			$conn = mysqli_connect($servername, $username, $password, $database);
			// Check connection
			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}

			 $sql = "select * from admin  where ad_id = '" . $_SESSION['username'] . "' and ad_matkhau ='" . $_SESSION['password'] . "';";

			$result = mysqli_query($conn,$sql);
			if( mysqli_num_rows($result) > 0){
				echo "<meta http-equiv='refresh' content='2;url=./fromNLCS.php'>";
				echo "dang nhap thanh Cong";
				//header('Location: fromNLCS.php');
			}
			else{
				echo "<meta http-equiv='refresh' content='2;url=./login.php'>";
				echo "Sai tai khoan hoac mat khau";
				//header('Location: login.php');
			}

			mysqli_close($conn);
	?>