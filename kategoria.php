<?php
	
	session_start();
	include_once("functions.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Project theme | css test</title>
	<!--CSS files-->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/footer.css">
	<link rel="stylesheet" type="text/css" href="css/body.css">
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Barrio|Oswald|Roboto+Slab" rel="stylesheet">
	<!--Scripts-->

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/main.js"></script>
	<script src="js/user_handler.js"></script>
</head>
<body>
<?php if (!isset($_SESSION['name'])) {include("modal.php");} ?>
	<div class="main-container">
		<!--Head of the of the theme-->
		<div class="head">
			<!--info and contact including social icons-->
			<div class="info">
				<ul class="contact">
					<li>Tel: +355695832828 &nbsp;&nbsp;</li>
					<li>Email: info@template.com</li>
				</ul>

				<!--Social media icons here-->
				<ul class="social">
					<li><a href="http://www.facebook.com" target="_blank"><img src="images/facebook.png"></li></a>
					<li><a href="http://www.twitter.com" target="_blank"><img src="images/twitter.png"></li></a>
					<li><a href="http://www.instagram.com" target="_blank"><img src="images/instagram.png"></li></a>
					<li><a href="http://www.youtube.com" target="_blank"><img src="images/youtube.png"></li></a>
					<li><a href="http://www.googleplus.com" target="_blank"><img src="images/googleplus.png"></li> </a>

				</ul>
			<!--End of info div-->
			</div>

			<!--Banner containig website's logo, a login/register button and subscibe-->
			<div class="banner">
				<img src="images/purpur.png">

				<?php if (isset($_SESSION["name"])): ?>
					<div class="btn-group" style="float: right; margin-top: 30px;">
						<p style="display: inline; border: 2px solid blue; padding: 8px 15px; margin-right: -5px; font-weight: bold;"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $_SESSION["name"];?></p>
						<form method="post" action="logout.php" style="display: inline;">
							<input type="submit" name="dil" value="Dilni   " class="success" id="logout" style="padding-top: 12px; margin-right: -22px;"><i class="fa fa-sign-out" aria-hidden="true" style="color: #fff; margin-right: 0px;"></i> 
						</form>
						<a href="#" class="danger subscibe">Subscribe</a>
					</div>	
				<?php else: ?>
					<div class="btn-group" style="float: right; margin-top: 30px;">
						<a href="#login" class="success" id="loginButton" style="margin-right: -20px;">Login&nbsp;&nbsp;</a><i class="fa fa-sign-in" aria-hidden="true" style="color: #fff;"></i>
						<a href="#register" class="data" id="registerButton">Register</a>
						<a href="#" class="danger">Subscribe</a>
					</div>
				<?php endif ?>				


			<!--End of banner div-->
			</div>
		<!--End of head div-->
		</div>



		<center style="width: inherit;">
		<!--Main menu navigation-->
			<ul class="main-menu-nav">
				<li><a href="index.php"><i class="fa fa-home" target="_blank"> </i></a></li>
				<li><a href="kategoria.php?kat_name=politike" target="_blank">POLITIKË</a></li>
				<li><a href="kategoria.php?kat_name=sociale" target="_blank">SOCIALE</a></li>
				<li><a href="kategoria.php?kat_name=ekonomi" target="_blank">EKONOMI</a></li>
				<li><a href="kategoria.php?kat_name=rajoni" target="_blank">RAJONI</a></li>
				<li><a href="kategoria.php?kat_name=sport" target="_blank">SPORT</a></li>
				<li><a href="kategoria.php?kat_name=showbiz" target="_blank">SHOWBIZ</a></li>
				<li><a href="kategoria.php?kat_name=teknologji" target="_blank">TEKNOLOGJI</a></li>
			</ul>
			<div id="search-form" style="float: right; margin-right: -150px; margin-top: -7px;">
				<input type="text" name="search" class="search"><button id="search"><i class="fa fa-search" aria-hidden="true"></i></button>
				<div class="s_result"></div>
			</div>
			
		</center>

	<!--End of main container div-->
	<!--Pjesa e lajmeve poshte-->

		<div class="main-news">
			<?php include ("body.php"); ?>

			

		</div>

		<hr class="sep">
	<!--Footer section here-->
		<?php include ("footer.php"); ?>

	</div>
</body>
</html>