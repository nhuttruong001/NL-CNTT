<?php
	session_start();
	$id_monan = $_GET["maso"];

	if(!isset($_SESSION["shoppingCart"])){
		$_SESSION["shoppingCart"] = array();
		
	}

	// id san pham da ton tai va tang so luong san pham
	if(isset($_SESSION["shoppingCart"][$id_monan])){	
		$_SESSION["shoppingCart"][$id_monan] = $_SESSION["shoppingCart"][$id_monan] +1;
		
	} else {
		$_monan = array($_GET["maso"] => 1);
		$_SESSION["shoppingCart"] = array_merge($_SESSION["shoppingCart"],$_monan);
	}
	//session_destroy();
	header("Location: viewCart.php");
?>