<?php  
session_start();
?>
<?php
if(isset($_SESSION['username']) && isset($_SESSION['password']) ){
		unset($_SESSION['username']);
		unset($_SESSION['password']);
		header('Location: ../pages/index.php');

}
 ?>