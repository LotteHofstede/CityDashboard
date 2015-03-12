<?php

	header('Content-type: application/json');
    require_once('../../php/MongoDBHandler.php');
    session_start();
    $COLLECTION = 'foursquare';
    $_SESSION["latitude"] = $_GET["latitude"];
    $_SESSION["longitude"] = $_GET["longitude"];

    $array = MongoDBHandler::request($COLLECTION);


	
	$count = 1;
	foreach ($array as $checkin) {
		$arrayOut['checkin' . $count] = array(
			"place" => $checkin['name'],
			"loc" => $checkin['loc'],
			"checkinsCount" => $checkin['checkinsCount'],
			"usersCount" => $checkin['usersCount']
		);
		$count++;
	}
	
	echo json_encode($arrayOut);
	
	
	
?>
