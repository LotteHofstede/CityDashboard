<?php
require('../../php/MongoDBHandler.php');

header('Content-type: application/json');

$COLLECTION = 'instagram';
session_start();
$_SESSION["latitude"] = $_GET["latitude"];
$_SESSION["longitude"] = $_GET["longitude"];
$array = MongoDBHandler::request($COLLECTION);
	$count = 1;
	foreach ($array as $pic) {
		$arrayOut['picture' . $count] = array(
			"loc" => $pic['loc'],
			"date" => date('F j H:i:s',$pic['created_at']->sec),
			"url" => $pic['url'],
			"caption" => $pic['caption']
		);
		$count++;
	}
	echo json_encode($arrayOut);
	
	
	
?>