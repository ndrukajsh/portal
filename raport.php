<?php 
	include("functions.php");
	$done = 0;
	if (isset($_POST['submit'])){
		$titulli = $_POST['titull'];
		$permb = $_POST['content'];
		$data = date("l j F Y h:i:s A");

		if (isset($_FILES["foto"]['name'])) {

			$validextensions = array("jpeg", "jpg", "png");      // tipet e fileve qe lejohen
			$ext = explode('.', basename($_FILES["foto"]['name']));   // Merr e emrin e imazhit dhe e ndan mbaresen(.)
			$file_extension = end($ext); // ruan mbaresen ne variabel

			if (($_FILES["foto"]["size"] < 100000) && in_array($file_extension, $validextensions)) { //kontrollon nqs fotoja eshte ne rregull nga madhesia dhe mbaresa
				$target_path = "raport_img/".$ext[0].".".$file_extension;
				//vendos folderin se ku do te hidhet fotoja
				if (move_uploaded_file($_FILES["foto"]['tmp_name'], $target_path)) {
					// Kontrollo nqs fotoja eshte hedhur te folderi ne server
					$sql = "INSERT INTO raport_lajm (titulli, permbajtja, data, imazh) VALUES ('".$titulli."' , '".$permb."', '".$data."', '".$target_path."')";
					//fut ne db te dhenat si dhe pathin ku ndodhet fotoja
					$conn = connect();
					if (mysqli_query($conn, $sql)) {
						$done = 1;
					}								
				} else {     //  Nqs fotoja nuk eshte hedhur shfaq lajmerim
					$done = 2;	
				}
			} else {     //   nqs madhesia ose formati eshte i gabuar
				$done = 3;
			}
		}else{ // nqs tenton te ngarkoje hedhe lajm pa ngarkuar foto
			$done = 4;
		}
		
	}

	$data = getResult('Select * from location');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Raporto</title>
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

		#titull, #content{
			width: 80%;
			padding-bottom: 1%;
			padding-top: 1%;
			margin-bottom: 2%;
			background-color: #e6eeff;
			border: 1px solid #99ccff;
		}

		p{
			margin: 0px;
			font-weight: bold;
			width: 11.5%;
			font-size: 25px;
		}

		#foto{
			margin-bottom: 3%;
		}

		#map{
			height: 400px;
			width: 90%;
		}
	</style>
</head>
<body>
	<div class="main_form">
		<div id="container">
			<h1>Raporto Lajm</h1>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
				<p>Titulli: </p><br>
				<input type="text" name="titull" id="titull" placeholder="Opsional"><br>
				<p>Permbajtja:</p><br>
				<textarea type="text" name="content" id="content" required="true" rows="14"></textarea><br>
				<input type="file" name="foto" id="foto"><br>
				<input type="submit" name="submit" id="posto" value="Posto">	
			</form>
			<p>
				<?php 
					if ($done == 1) {
						echo "<h2 style='color: green;'>Lajmi u raportua me sukses!!!<h2>";
					}elseif ($done == 2) {
						echo "<h2 style='color: red;'>Gabim ne ngarkim!!!<h2>";
					}elseif ($done == 3) {
						echo "<h2 style='color: red;'>Fotoja eshte shume e madhe ose ne formatin e gabuar!!!<h2>";
					}elseif ($done == 4) {
						echo '<h2 style="color: red;">Ngarkoni foto<h2>';
					}
				?>
			</p>
			
			<div style="padding-top: 1%;">
			<hr>
				<center><h1>Shto vendndodhjen e lajmit</h1></center>
				<center><h4>Kliko ne harte per te shtuar vendndodhjen e lajmit</h4></center>
				<div id="map"></div>
			</div>
			
		</div>
	</div>
	<script>
	
	var d = <?php echo json_encode($data); ?>;
	function initMap(){
		var map = new google.maps.Map(document.getElementById('map'), {
			mapTypeControl: true,
			zoom: 14,
			center: {
				lat: 41.3275,
				lng: 19.8187
			},
		});

		var count = 0;
		map.addListener('click', function(event){
			count++;
			if (count == 1) {
				var marker = new google.maps.Marker({
					position: event.latLng,
					map: map
				});
			}else{
				alert("Vendndodhja eshte shtuar tashme!");
			}
		});

		// for (var i = 0; i < d.length; i++) {
		// 	var marker = new google.maps.Marker({
		// 		position: {
		// 			lat: parseFloat(d[i].lat),
		// 			lng: parseFloat(d[i].lng)
		// 		},
		// 		map: map
		// 	});
		// }
	}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8vnHNOlgcYkG07SXlK2Vsx8DlKC_OR3E&callback=initMap"></script>


</body>
</html>