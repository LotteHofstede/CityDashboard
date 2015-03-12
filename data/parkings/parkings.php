<?php
header('Content-type: application/json');

function getParkings($city){
	$parkings = array();
	$count = 1;
	
	if($city == "Brussels"){
		$url = "http://data.irail.be/Parkings/" . $city . ".json";
		$jsondata = file_get_contents($url);
		$arrayData = json_decode($jsondata, true);
		
		foreach($arrayData[$city] as $parking){
			$parkings['parkings']['parking' . $count] = array(
				'name' => ucwords(strtolower($parking['name_nl'])),
				'free_places' => $parking['free_places'],
				'total_places' => $parking['total_places'],
				'latitude' => $parking['latitude'],
				'longitude' => $parking['longitude']
			);
			$count++;
			
			$parkings['overall_available'] += $parking['free_places'];
			$parkings['overall_occupied'] += $parking['total_places'] - $parking['free_places']; 
			$parkings['overall_total'] += $parking['total_places'];
			$parkings['overall_occupation'] = ($parkings['overall_occupied']/$parkings['overall_total'])*100;
		}
	}
	
	if (file_exists('parkings_' . strtolower($city) . '.json')) {
		$fp = fopen('parkings_' . strtolower($city) . '1.json', 'w');
		fwrite($fp, json_encode($parkings));
		fclose($fp);
		
		if (file_exists('parkings_' . strtolower($city) . '1.json')) {
			unlink('parkings_' . strtolower($city) . '.json');
			rename('parkings_' . strtolower($city) . '1.json','parkings_' . strtolower($city) . '.json');
		}
	} else {
    	$fp = fopen('parkings_' . strtolower($city) . '.json', 'w');
		fwrite($fp, json_encode($parkings));
		fclose($fp);
	}
	
}

getParkings("Brussels");
?>