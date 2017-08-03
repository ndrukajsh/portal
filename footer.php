<?php 
		$data = date("m/d/Y");
		$date = explode("/", $data);
		$muajt = array("Janar", "Shkurt", "Mars", "Prill", "Maj", "Qershor", "Korrik", "Gusht", "Shtator", "Tetor", "Nentor", "Dhjetor");
		$month = intval(substr($date[0], -1));
		$format = $date[1]."/".$muajt[$month-1]."/".$date[2];

 ?>

<div class="footer">
	<a href="#">Rreth nesh</a>
	<a href="raport.php">Raporto</a>
	<a href="feedback.php">Pershtypje</a>
	<ul class="social">
		<li><a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
		<li><a href="http://www.twitter.com" target="_blank"><i class="fa fa-twitter-square fa-2x"></i></a>
		<li><a href="http://www.instagram.com" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
		<li><a href="http://www.youtube.com" target="_blank"><i class="fa fa-youtube-square fa-2x"></i></a>
		<li><a href="http://www.googleplus.com" target="_blank"><i class="fa fa-google-plus fa-2x"></i></a>	
	</ul>
	<div class="mbyll">
		<p id="copy">&copy; News agency theme</p>
		<span id="data"><?php echo $format; ?></span>
	</div>
</div>