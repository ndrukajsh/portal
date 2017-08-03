<?php 
	include_once("functions.php");

	$input = $_POST['s_val'];
	$gjat = $_POST['l'];

	$is = false;

	$query_title = "SELECT * FROM lajmi";

	$result = getResult($query_title);

	foreach ($result as $r) {
		$titulli = $r['Titulli'];
		$t = $r['Tags'];

		//echo $tags;
		$tags = explode(" ", $t);



		if (strtolower(substr($titulli, 0, $gjat)) == strtolower($input)) {
			echo "<a href='lajmi.php?lajmi=".$titulli."' target='_blank'>".$titulli."</a><br>";
			$is = true;
		}
		for ($i=0; $i < sizeof($tags); $i++) { 
			if ($input == $tags[$i]) {
				echo "<a href='lajmi.php?lajmi=".$titulli."' target='_blank' class='stil'>".$titulli."</a><br>";
				$is = true;
			}
		}
	}

	if (!$is) {
		echo $is;
	}




?>