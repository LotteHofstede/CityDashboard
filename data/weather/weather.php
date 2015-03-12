<?php
	function exportWeather($city) {
		$url = "http://api.openweathermap.org/data/2.5/forecast/daily?q=" . $city . "&mode=json&units=metric&cnt=7";
		$jsondata = file_get_contents($url);
		$arrayData = json_decode($jsondata, true);
		
		if (file_exists('weather_' . $city . '.json')) {
			$fp = fopen('weather_' . $city . '1.json', 'w');
			fwrite($fp, json_encode($arrayData));
			fclose($fp);
		
			if (file_exists('weather_' . $city . '1.json')) {
				unlink('weather_' . $city . '.json');
				rename('weather_' . $city . '1.json','weather_' . $city . '.json');
			}
		} else {
    		$fp = fopen('weather_' . $city . '.json', 'w');
			fwrite($fp, json_encode($arrayData));
			fclose($fp);
		}
	}
	
	#CALL FUNCTIONS
	exportWeather("leuven");
	exportWeather("gent");
	exportWeather("antwerpen");
	exportWeather("brussel");
?>