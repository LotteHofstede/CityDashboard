<?php
header('Content-type: application/json');

function getBikeshare($city){
	if($city == "antwerpen"){
		$url = "http://data.irail.be/Bikes/Velo.json";
		$company = "Velo";
	} else if($city == "brussel"){
		$url = "http://data.irail.be/Bikes/Villo.json";
		$company = "Villo";
	}
	$jsondata = file_get_contents($url);
	$arrayData = json_decode($jsondata, true);
	
	$bikes = array();
	$count = 1;
	
	foreach($arrayData[$company] as $bikeLot){
		$bikes['lots']['bikelot' . $count] = array(
			'name' => ucwords(strtolower($bikeLot['name'])),
			'freebikes' => $bikeLot['freebikes'],
			'freespots' => $bikeLot['freespots'],
			'state' => strtolower($bikeLot['state']),
			'latitude' => $bikeLot['latitude'],
			'longitude' => $bikeLot['longitude']
		);
		$count++;
		
		$bikes['occupied'] += $bikeLot['freespots']; 
		$bikes['available'] += $bikeLot['freebikes'];
		$bikes['total'] += $bikeLot['freespots'] + $bikeLot['freebikes'];
		$bikes['occupation'] = round(($bikes['occupied']/$bikes['total'])*100) . '%';
		$bikes['status'] = getStatus($bikes['occupation']);
	}	
	
	if (file_exists('bikes_' . $city . '.json')) {
		$fp = fopen('bikes_' . $city . '1.json', 'w');
		fwrite($fp, json_encode($bikes));
		fclose($fp);
		
		if (file_exists('bikes_' . $city . '1.json')) {
			unlink('bikes_' . $city . '.json');
			rename('bikes_' . $city . '1.json','bikes_' . $city . '.json');
		}
	} else {
    	$fp = fopen('bikes_' . $city . '.json', 'w');
		fwrite($fp, json_encode($bikes));
		fclose($fp);
	}
	
}

function getStatus($int){
	$number = $int;
	$out = "";
	if($number >= 0 && $number < 10){
		$out = "#0c8000";
	} else if($number >= 10 && $number < 20){
		$out = "#268000";
	} else if($number >= 20 && $number < 30){
		$out = "#4c8000";
	} else if($number >= 30 && $number < 40){
		$out = "#668000";
	} else if($number >= 40 && $number < 50){
		$out = "#7f8000";
	} else if($number >= 50 && $number < 60){
		$out = "#996600";
	} else if($number >= 60 && $number < 70){
		$out = "#b24d00";
	} else if($number >= 70 && $number < 80){
		$out = "#cc3300";
	} else if($number >= 80 && $number < 90){
		$out = "#e51a00";
	} else if($number >= 90 && $number <= 100){
		$out = "#ff0000";
	}
	return $out;
}

getBikeshare("antwerpen");
getBikeshare("brussel");
?>