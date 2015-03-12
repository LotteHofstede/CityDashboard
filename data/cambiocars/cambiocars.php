<?php
header('Content-type: application/json');

function getCambios($city){

	$city = strtolower($city);
	
	if($city == "brussel"){
		$city = "bxl";
	}

	$cambios = array();
	$count = 1;
	
	$url = "http://data.irail.be/NMBS/CambioBluebikes.json";
	$jsondata = file_get_contents($url);
	$arrayData = json_decode($jsondata, true);
	
	$totalCarCount;
		
	foreach($arrayData['CambioBluebikes'] as $places){
		if(strpos(strtolower($places['station']), $city) !== FALSE){
			$cambios['stations']['cambio' . $count] = array(
				'station' => $places['station'],
				'cambio' => $places['cambio'],
				'numberOfCars' => intval($places['numberofcars']),
				'blueBikes' => $places['bluebikes']
			);
			$totalCarCount += intval($places['numberofcars']);
			$count++;
		}
	}
	
	$cambios['totalCarCount'] = $totalCarCount;
	
	if (file_exists('cars_' . $city . '.json')) {
		$fp = fopen('cars_' . $city . '1.json', 'w');
		fwrite($fp, json_encode($cambios));
		fclose($fp);
		
		if (file_exists('cars_' . $city . '1.json')) {
			unlink('cars_' . $city . '.json');
			rename('cars_' . $city . '1.json','cars_' . $city . '.json');
		}
	} else {
    	$fp = fopen('cars_' . $city . '.json', 'w');
		fwrite($fp, json_encode($cambios));
		fclose($fp);
	}
}

getCambios("antwerpen");
getCambios("gent");
getCambios("leuven");
getCambios("brussel");
?>