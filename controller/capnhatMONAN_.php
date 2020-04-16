<?php
	include 'connectMySQL.php';

	
	$sql = "update monan set monan_ten='".$_POST['tenmonan']."',
			loai_ma='".$_POST['loai']."',monan_gia='".$_POST['giamonan']."',
			monan_diengiai='".$_POST['diengiaimonan']."',image='". $_FILES["image"]["name"]."' where monan_ma='".$_POST['monan_ma']."';";

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
		echo "cập nhật món ăn thành công";
		echo "<meta http-equiv='refresh' content='2;url=./capnhatHome1.php'>";
	}else
	{
		echo "cập nhật món ăn thất bại";
			echo "<meta http-equiv='refresh' content='2;url=./formcapnhatMONAN.php'>";
	}
?>