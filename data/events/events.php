<?php
header('Content-type: application/json');

global $key;
$key = "AEBA59E1-F80E-4EE2-AE7E-CEDD6A589CA9"; 

function getEvents($city){
	global $key;
	$url = "http://build.uitdatabank.be/api/events/search?key=" . $key . "&city=" . $city . "&sort=date%20asc&format=json";
	$jsondata = file_get_contents($url);
	$arrayData = json_decode($jsondata, true);
	
	$events = array();
	$count = 1;
	
	for ($i = 0; $i<5; $i++){
		$id = $arrayData[$i]['id'];
		$title = $arrayData[$i]['title'];
		$description = $arrayData[$i]['shortdescription'];
		$thumb = $arrayData[$i]['thumbnail'];
		$date = $arrayData[$i]['calendarsummary'];
		$location = $arrayData[$i]['location'];
		$latlong  = explode(";", $arrayData[$i]['latlng']);
		$lat = $latlong[0];
		$long = $latlong[1];
		$address = $arrayData[$i]['address'];
		
		$events["event" . $count] =   array(
				"id" => $id,
				"title" => $title,
				"description" => $description,
				"thumb" => $thumb,
				"date" => $date,
				"location" => $location,
				"lat" => $lat,
				"long" => $long,
				"address" => $address
			);
		$count++;
	}
	if (file_exists('events_' . strtolower($city) . '.json')) {
		$fp = fopen('events_' . strtolower($city) . '1.json', 'w');
		fwrite($fp, json_encode($events));
		fclose($fp);
		
		if (file_exists('events_' . strtolower($city) . '1.json')) {
			unlink('events_' . strtolower($city) . '.json');
			rename('events_' . strtolower($city) . '1.json','events_' . strtolower($city) . '.json');
		}
	} else {
    	$fp = fopen('events_' . strtolower($city) . '.json', 'w');
		fwrite($fp, json_encode($events));
		fclose($fp);
	}
	
	
}

getEvents("gent");
getEvents("leuven");
getEvents("antwerpen");
getEvents("brussel");
?>