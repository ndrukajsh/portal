<?php 
	session_start();
	include("functions.php");

	$id = $_SESSION["id"];
	$url = $_POST['url'];
	$data = date("l j F Y h:i:s A");
	$l_id = $_POST['id'];



	if ($_POST["komento"]) {
		$permbajtja = $_POST['textarea'];

		$sql = "INSERT into komenti (id_Lajmi , id_user, Permbajtja, Data) VALUES ('".$l_id."' , '".$id."', '".$permbajtja."', '".$data."')";
		$c = connect();

		if (mysqli_query($c, $sql)) {
			header("Location: lajmi.php?id=".$l_id."");
		}else{
			die();
		}
	}

?>

