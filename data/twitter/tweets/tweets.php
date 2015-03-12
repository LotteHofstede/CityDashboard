<?php
	require_once('../../../php/MongoDBHandler.php');
	
	header('Content-type: application/json');
	
						$COLLECTION = 'twitter';


                        session_start();
                        $_SESSION["latitude"] = $_GET["latitude"];
                        $_SESSION["longitude"] = $_GET["longitude"];

						$array = MongoDBHandler::request($COLLECTION);

	
	$count = 1;
	foreach ($array as $tweet) {
		$arrayOut['tweet' . $count] = array(
			"loc" => $tweet['loc'],
			"date" => $tweet['date'],
			"message" => $tweet['message']
		);
		$count++;
	}
	
	echo json_encode($arrayOut);
?>