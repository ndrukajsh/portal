<?php
	include_once("functions.php");

	$sql_main = "SELECT * FROM lajmi ORDER BY RAND() LIMIT 5";
	$sql_latest = "SELECT * FROM lajmi ORDER BY id DESC LIMIT 10";
	$sql_all  = "SELECT * FROM lajmi";
	


	if (isset($_GET['id'])) {
		$query = "SELECT * FROM lajmi WHERE id='".$_GET['id']."' LIMIT 1";
		$fq_lajmit = getResult($query);
		$id_l = "";

		
	}

	$id_lajmi = '';

	
	if (isset($_GET['kat_name'])) {
		//$kat_query = "SELECT lajmi.Id_kat, kategoria.emri FROM lajmi INNER JOIN kategoria ON lajmi.Id_kat=kategoria.id";
		//$kat_query = "SELECT * FROM lajmi WHERE Id_kat LIKE (SELECT id FROM kategoria WHERE emri = '".$_GET['kat_name']."')";
		$kat_query = "SELECT * FROM kategoria WHERE emri='".$_GET['kat_name']."' LIMIT 1";
		$kat_lajme = getResult($kat_query);
		$idk = "";
		foreach ($kat_lajme as $id_k) {
			$idk = $id_k['id'];
		}

		$l_k = getResult("SELECT * FROM lajmi WHERE Id_kat='".$idk."'");
	}

	$lajmet_kryesore = getResult($sql_main);
	$data = getResult($sql_latest);
	
	$all = nr_total_elemente($sql_all);

	$lajme_faqe = 4;

	$tot_faqe = ceil($all/$lajme_faqe);
	//sepse gjithmone do te kete nje faqe me teper ne fund qe do te mbaje nr jo te plote te lajmeve psh 4-3-2-1 etj
	if (isset($_GET['id'])) {
		$lajm_id = $_GET['id'];
	}
	

?>

<div class="body-content">
	<div class="row">


<?php if (isset( $_GET['lajmi'])): ?>
	<div class="lajmi-fq">
		<?php foreach ($fq_lajmit as $fl): ?>
			<img src="<?php echo $fl['Imazh']; ?>" width="700" height="400" style="padding-top: 7%;">		
		<?php endforeach ?>
	</div>
<?php else: ?>
		<div class="sliderBox">
		<p style="font-weight: bold; font-size: 25px; letter-spacing: 1px; margin-top: 0% ;font-family: 'Abril Fatface', cursive; padding-bottom: 5px;">Lajmet Kryesore</p>
			<div class="slider">

				<figure>	
					<?php foreach ($lajmet_kryesore as $l): ?>
						<div class="slide">
							<a href="<?php echo 'lajmi.php?lajmi='.$l['Titulli'].'&id='.$l['id']; ?>" target="_blank"><?php echo '<p class="ntit">'.$l['Titulli'].'</p>'; ?></a>
							<img src= " <?php echo $l['Imazh']; ?>" >
						</div>
					<?php endforeach ?>
				</figure>

			</div>
		</div>
<?php endif ?>
		<div class="latest-news">
			<ul class="lajmi-fundit">
				<p style="font-weight: bold; font-size: 25px; font-family: 'Abril Fatface', cursive;  padding-bottom: 5px;  margin-top: 0%; color: #330026;">Lajmet e fundit</p>
				<?php foreach ($data as $l): ?>
					<a href="<?php echo 'lajmi.php?lajmi='.$l['Titulli'].'&id='.$l['id']; ?>"" target="_blank"><li>
						<?php echo '<p class="titulli"><i class="fa fa-angle-double-right"></i> '.$l['Titulli'].'</p>'; ?>
						<?php $time = explode(" ", $l['Data']); ?>
						<ul style="list-style-type: none; float: right; margin-top: 6%;">
							<?php echo '<li class="au">'.$l['Id_autor'].'</li>'; ?>
							<?php echo '<li class="n-data">'.$time[0].'</li>'; ?>
						</ul>
					</li></a>
				<?php endforeach ?>
			</ul>
		</div>
		<hr class="sep">		
	</div>

	<div class="row">


<?php if (isset( $_GET['id'])): ?>
	<div class="lajmi-fq">
		<?php foreach ($fq_lajmit as $fl): ?>
			<?php $id_lajmi = $fl["id"]; ?>
			<h1><?php echo $fl["Titulli"]; ?></h1>
			<p style="font-style: italic;"><?php echo $fl["Nentitulli"]; ?></p>
			<p><?php echo $fl["Permbajtja"]; ?></p>
			<ul style="list-style-type: none;">
				<li style="display: inline;"><?php echo $fl["Data"]; ?></li>
				<li style="display: inline;"><?php echo $fl["Id_autor"]; ?></li>
				
			</ul>
				<?php 
					$query_kat = "SELECT * FROM kategoria WHERE id='".$fl['Id_kat']."'LIMIT 1";
					$e_kat = getResult($query_kat);
					$kategoria = "";
					foreach ($e_kat as $k) {
						$kategoria = $k["emri"];

					}
				?>
			
				<p style="text-align: right;"><b>Kategoria: </b><span style="text-transform: uppercase;"><?php echo $kategoria; ?></span></p>

				<?php 
					$tag = explode(" ", $fl["Tags"]);

					$tage = '';

					for ($i=0; $i <sizeof($tag) ; $i++) { 
						$tage .= "<span style='border-width:2px; border-style:outset; padding: 1% 1.5%; margin-right: 0.5%; background-color: #e6ecff;'><i class='fa fa-tags' aria-hidden='true'></i> ".$tag[$i]."</span>";
					}
 

				 ?>

				<p style="width: 100%;"><b>Fjalet kyce: </b><?php echo $tage; ?></p>
				
				

				<!--Komentet nga db ketu-->
			
				

		<?php endforeach ?>
		<hr>
		<!--Pjesa per komente-->
		<?php 
			$sql_koment = "SELECT * FROM komenti WHERE id_Lajmi='".$id_lajmi."'";
			$nr_komenteve = nr_total_elemente($sql_koment);
			$name_query = "SELECT user.username, komenti.Permbajtja, komenti.Data FROM user INNER JOIN komenti ON user.id=komenti.id_user WHERE id_Lajmi='".$id_lajmi."'";
			$names = getResult($name_query);
		?>
		<?php if ($nr_komenteve >= 1): ?>
			<?php foreach ($names as $n): ?>
				<p style="margin: 0px; font-weight: bolder;"><i class="fa fa-comments" aria-hidden="true"></i> <?php echo $n['username']; ?></p>
				<p style="margin: 0px; padding-left: 5%"><?php echo $n['Permbajtja']; ?></p>
				<p style="text-align: right; font-size: 12px; margin: 0px;"><?php echo $n['Data']; ?></p>
			<?php endforeach ?>
		<?php endif ?>

		<?php if (isset($_SESSION['name'])): ?>

			<hr>
			<form method="post" action="koment.php">
				<textarea rows="10" cols="95" resize="false" name="textarea"></textarea><br>
				<input type="hidden" name="id" value="<?php echo $lajm_id; ?>">
				<input type="hidden" name="url" value="<?php echo $_GET['lajmi']; ?>">

				<input type="submit" name="komento" id="komento" value="Komento">
			</form>			
		<?php endif ?>

	</div>

	<?php else: ?>
			<?php if (isset($_GET['kat_name'])): ?>
				<div class="lajmi-fq">
				<?php foreach ($l_k as $k_lajme): ?>
					<!--BEGGINING OF LOOP-->
					
					<img src="<?php echo $k_lajme['Imazh']; ?>" style="width: 180px; height: 140px; float: left; margin: 1%;">
					<p style="padding-left: 15%; font-weight: bold;"><?php echo $k_lajme['Titulli']; ?></p>
					<p style="padding-left: 15%; font-size: 15px;"><i><?php echo $k_lajme['Nentitulli']; ?></i></p>
					<?php 
						$fjalite = "";
						$show = explode(".", $k_lajme['Permbajtja']);
						for ($a=0; $a < 4; $a++) { 
							$fjalite = $fjalite.$show[$a].". ";
						}
					?>
					<p style="padding-left: 5%;"><?php echo $fjalite."..."; ?>
					<a href="<?php echo 'lajmi.php?lajmi='.$k_lajme['Titulli'].'&id='.$k_lajme['id']; ?>" target="_blank">Me shume<i class="fa fa-angle-double-right"></i></a></p>
					<ul style="list-style-type: none; float: right; margin-top: -1%; margin-bottom: 0px;">
						<?php echo '<li class="au">'.$k_lajme['Id_autor'].'</li>'; ?>
						<?php echo '<li class="n-data">'.$k_lajme["Data"].'</li>'; ?>
					</ul>
					<hr class="sep" style="width: 100%;">



					<!--END OF LOOP-->
				<?php endforeach ?>
				</div>
			<?php else: ?>
				<div class="news"></div>
			<?php endif ?>
	<?php endif ?>

		<div class="rekl">
			<p>reklama</p>

			<h1 id="kliko">Kliko ketu</h1>

		</div>

		<?php if (!isset( $_GET['lajmi'])): ?>
			<div style="float: left; width: 65%;">
				<ul class="faqosja">
					<li><i class="fa fa-angle-double-left prev"></i></li>
					<li class="active nr">1</li>
					<?php 
						for ($i=2; $i <= $tot_faqe; $i++) { 
							echo '<li class="nr">'.$i.'</li>';
						}
					?>
					<li><i class="fa fa-angle-double-right next"></i></li>
				</ul>
				<?php echo '<p id="nrTot" style="visibility: hidden;">'.$tot_faqe.'</p>'; ?>
			</div>	
		<?php endif ?>
			
		
	


	</div>

</div>