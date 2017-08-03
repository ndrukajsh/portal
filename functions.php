<?php 

	function connect(){
		$dblink = mysqli_connect("localhost", "root", "", "projekt");
		if (!$dblink) {
			die("Lidhja me databazen nuk mund te realizohet");
		}

		return $dblink;
	}

	function getResult($query){
		$conn = connect();

		$data = array();

		$res = mysqli_query($conn, $query);
		while ($row = mysqli_fetch_assoc($res)) {
			$data[] = $row;
		}

    	return $data;

	}

	function nr_total_elemente($query){
		$conn = connect();
		$res = mysqli_query($conn, $query);
		$num_rows = mysqli_num_rows($res);
		return $num_rows;
	}

	function formati_kohor(){

		$data = date("m/d/Y");
		$date = explode("/", $data);
		$muajt = array("Janar", "Shkurt", "Mars", "Prill", "Maj", "Qershor", "Korrik", "Gusht", "Shtator", "Tetor", "Nentor", "Dhjetor");
		$month = intval(substr($date[0], -1));
		$format = $date[1]."/".$muajt[$month-1]."/".$date[2];

		echo $format;
	}

?>