<?php
	
	include("functions.php");
	$user = "";
	$done = 2;
	if (isset($_POST['submit'])) {
		if (isset($_SESSION['name'])) {
			$user = $_SESSION['name'];
		}else{
			$user = $_POST['emri'];
		}
		$feedback = $_POST['content'];

		$sql = "INSERT INTO feedback (user, permbajtja) VALUES ('".$user."' , '".$feedback."')";
					//fut ne db te dhenat si dhe pathin ku ndodhet fotoja
		$conn = connect();
		if (mysqli_query($conn, $sql)) {
			$done = 1;
		}
	}
	

?>

<style type="text/css">
		body{
			background-color: #f9e6ff;
		}
		textarea{
			resize: none;
		}

		#container{
			width: 90%;
			margin: auto;
			padding: 2% 9% 5% 9%;
		}

		.main_form{
			width: 85%;
			height: inherit;
			margin: -20px auto;
			background-color: #fff;
		}

		#emri, #content{
			width: 80%;
			padding-bottom: 1%;
			padding-top: 1%;
			margin-bottom: 2%;
			background-color: #e6eeff;
			border: 1px solid #99ccff;
		}

	</style>

<body>
	<div class="main_form">
		<div id="container">
			
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				<p>Emri: </p><br>
				<input type="text" name="emri" id="emri" placeholder="Emri juaj" required="true"><br>
				<p>Pershtypje: </p><br>
				<textarea type="text" name="content" id="content" required="true" rows="14"></textarea><br>
				<input type="submit" name="submit" id="posto" value="Posto">	
			</form>
			<p>
				<?php 
					if ($done == 1) {
						echo "<h3 style='color: green; font-weight: bold;'>Pershtypja juaj u dergua me sukses</h3>";
					}else if($done == 0){
						echo "<h3 style='color: red; font-weight: bold;'>Error</h3>";
					}
				?>
			</p>
			
		</div>
	</div>
</body>