<?php
	include "connectMYSQL.php";

	$sql = "insert into monan(monan_ma,loai_ma,monan_ten,monan_gia,monan_diengiai,image) 
				values('" .$_POST['monan_ma']. "','" .$_POST['loai']. "','" .$_POST['tenmonan']. "', '".$_POST['giamonan']."',
				'".$_POST['diengiaimonan']."','". $_FILES["image"]["name"]."');";

	

	$target_dir = "img1/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["image"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}

	if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }



	$query = mysqli_query($conn,$sql);



	if($query){
		echo "Thêm mới thành công!!!";
		echo "<meta http-equiv='refresh' content='2;url=./themHome1.php'>";
	}else
	{
		echo "thêm mới thất bại!!!";
		echo "<meta http-equiv='refresh' content='2;url=./formthemMONAN.php'>";
	}


	mysqli_close($conn);



?>