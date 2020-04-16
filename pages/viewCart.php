<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>


<style>
.w3-lobster {
  font-family: "Lobster", serif;
}
</style>
</head>
<body>
	<div class="container">
		<div class="container w3-lobster">
		<p class="w3-xxxlarge">Đồ Ăn Vặt</p>
	</div>
		<center>
			<a href="../pages/index.php" class="btn btn-primary col-lg-3"> Về trang chủ</a>
			
		</center>
		<br>
		<h2 align="center">Món ăn trong giỏ hàng của bạn</h2><br>

				
				<?php
				if(!isset($_SESSION["shoppingCart"])){
					echo "<script>";
					echo "alert('Chua co san pham trong gio hang');";
					echo "window.location='../pages/index.php';";
					echo "</script>";
				}
				include "connectMYSQL.php";

				echo "<table class='w3-table-all w3-large'>";

				echo "<tr><th>STT</th><th>Ảnh </th><th>Tên món ăn </th><th>Giá</th><th>Số lượng</th></tr>";
					$stt=1;

					foreach ($_SESSION["shoppingCart"] as $x => $values){
						
						$sql = "select *from monan where MONAN_MA ='".$x."'";
						$row = $conn->query($sql)->fetch_assoc();
							if(isset($_SESSION['username'])){
						echo '<tr><td>'.$stt.'</td> <td><img src=img1/'.$row["IMAGE"].' width=15%;></td> <td>'.$row["MONAN_TEN"].'</td><td>'.$row["MONAN_GIA"].'</td><td>'.$_SESSION["shoppingCart"][$x].'</td><td> <TD>  <a href="../controller/xoamonantrongSHOPPINGCART.php?maso='.$row["MONAN_MA"].'" class="btn btn-warning">Xóa</a>  </TD></tr>  ';
						
						
						$stt = $stt+1;
						}
					}
				echo "</table>";
				?>	
				<h3 style="position: absolute;right: 350px;">Tổng tiền:</h3>
				<h3 type="button" class="btn btn-warning col-lg-1 " style="position: absolute;right: 215px;" >
					<?php 
							if(isset($_SESSION['username'])){
						$_SESSION['tongtien']=0;
						foreach ($_SESSION["shoppingCart"] as $key => $soluong) {
							$sql_t = "select *from monan where MONAN_MA='".$key."'";
							$_SESSION['tongtien'] = $_SESSION['tongtien'] + $conn->query($sql_t)->fetch_assoc()["MONAN_GIA"] * $soluong;
						}
						echo "$";
						echo $_SESSION['tongtien'];
					}
					?></h3>
				<br>
				<br>

				<?php  

					//echo $_SESSION['kh_ma']; //ma cua khach hang
					echo "<div>
					<a href='../controller/thanhtoan.php' type='button' class='btn btn-primary col-lg-1' style='position: absolute;right: 215px;' >Thanh toán</h3></a>
					</div> "; 
					// print_r($row['kh_ma']);
				?>
	</div>


</body>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<meta charset="utf-8">
	 	<link rel="stylesheet" type="text/css" href="css/reset.css">
    	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    	<script type="text/javascript" src="js/popper.min.js"></script>
     	<script type="text/javascript" src="js/jquery.js"></script>
     	<script type="text/javascript" src="vendor/bootstrap/js/bootstrap.js"></script>
     	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
        <link rel="stylesheet" href="../public/css/generalFormat.css">
</html>