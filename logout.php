<?php 
	session_start();

	if(isset($_POST["dil"])){
		unset($_SESSION["name"]);
		unset($_SESSION["p"]);
		header("Location: index.php");
	}

?>