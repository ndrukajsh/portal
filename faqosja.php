<?php

	include_once("connection.php");

	$faqja = (int) $_POST["page"];
	$lajme_faqe = 4;
	$fillimi = $faqja*$lajme_faqe - $lajme_faqe;
	$sql = "SELECT * FROM lajmi ORDER BY id DESC LIMIT ".$fillimi.",".$lajme_faqe;

	$data = getResult($sql);
?>


<?php foreach($data as $mainLajm): ?>
		<img src="<?php echo $mainLajm['Imazh']; ?>" style="width: 180px; height: 140px; float: left; margin: 1%;">
		<p style="padding-left: 15%; font-weight: bold;"><?php echo $mainLajm['Titulli']; ?></p>
		<p style="padding-left: 15%; font-size: 15px;"><i><?php echo $mainLajm['Nentitulli']; ?></i></p>
		<?php 
			$fjalite = "";
			$show = explode(".", $mainLajm['Permbajtja']);
			for ($a=0; $a < 4; $a++) { 
				$fjalite = $fjalite.$show[$a].". ";
			}
		?>
		<p style="padding-left: 5%;"><?php echo $fjalite."..."; ?><a href="<?php echo 'lajmi.php?id='.$mainLajm['id']; ?>" target="_blank">Me shume<i class="fa fa-angle-double-right"></i></a></p>
		<ul style="list-style-type: none; float: right; margin-top: -1%; margin-bottom: 0px;">
			<?php echo '<li class="au">'.$mainLajm['Id_autor'].'</li>'; ?>
			<?php echo '<li class="n-data">'.$mainLajm["Data"].'</li>'; ?>
		</ul>
		<hr class="sep" style="width: 100%;">
<?php endforeach ?>

