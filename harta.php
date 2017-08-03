<?php

	include 'connection.php';

	$data = getResult('Select * from location');

	// foreach ($data as $d) {
	// 	echo $d["lat"]."<br />";
	// }
?>

<div id="map" style="width: 60%; height: 500px;"></div>

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

		for (var i = 0; i < d.length; i++) {
			var marker = new google.maps.Marker({
				position: {
					lat: parseFloat(d[i].lat),
					lng: parseFloat(d[i].lng)
				},
				map: map
			});
		}
	}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8vnHNOlgcYkG07SXlK2Vsx8DlKC_OR3E&callback=initMap"></script>