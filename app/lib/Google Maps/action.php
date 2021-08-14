<?php 
	require 'education.php';
	$edu = new education;
	$edu->setId($_REQUEST['id']);
	$edu->setLat($_REQUEST['latitude']);
	$edu->setLng($_REQUEST['longitude']);
	$status = $edu->updateCollegesWithLatLng();
	if($status == true) {
		echo "Updated...";
	} else {
		echo "Failed...";
	}
 ?>