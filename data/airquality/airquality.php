<?php
include_once('../../php/simple_html_dom.php');
header('Content-type: application/json');

function getAirQuality($city){
	$regions = array();
	$html = file_get_html('http://luchtkwaliteit.vmm.be/regio.php');
	$div = $html->getElementById("#alpha");
	$table = $div->getElementByTagName("table");
	$tbody = $table->getElementByTagName("tbody");
	foreach($tbody->getElementsByTagName("tr") as $row){
		$regions[$row->children(0)->innertext] = array(
			"globals" => array("number" => getNumber($row->children(1)), "status" => getStatus($row->children(1))),
			"o3" => array("number" => getNumber($row->children(2)), "status" => getStatus($row->children(2))),
			"no2" => array("number" => getNumber($row->children(3)), "status" => getStatus($row->children(3))),
			"so2" => array("number" => getNumber($row->children(4)), "status" => getStatus($row->children(4))),
			"pm10" => array("number" => getNumber($row->children(5)), "status" => getStatus($row->children(5)))
		);
	}
	
	if (file_exists('airQuality_antwerpen.json') && file_exists('airQuality_gent.json')) {
    	$fp = fopen('airQuality_antwerpen1.json', 'w');
		fwrite($fp, json_encode($regions["Antwerpen"]));
		fclose($fp);
	
		$fp = fopen('airQuality_gent1.json', 'w');
		fwrite($fp, json_encode($regions["Gent"]));
		fclose($fp);
		
		if (file_exists('airQuality_antwerpen1.json') && file_exists('airQuality_gent1.json')) {
			unlink("airQuality_gent.json");
			unlink("airQuality_antwerpen.json");
			rename('airQuality_antwerpen1.json','airQuality_antwerpen.json');
			rename('airQuality_gent1.json','airQuality_gent.json');
		}
	} else {
    	$fp = fopen('airQuality_antwerpen.json', 'w');
		fwrite($fp, json_encode($regions["Antwerpen"]));
		fclose($fp);
	
		$fp = fopen('airQuality_gent.json', 'w');
		fwrite($fp, json_encode($regions["Gent"]));
		fclose($fp);
	}
	
}

function getNumber($int){
	return intval(substr($int,-6));
}

function getStatus($int){
	$number = intval(substr($int,-6));
	$out = "";
	if($number == "0"){
		$out = "Unknown";
	} else if($number == "1"){
		$out = "Excellent";
	} else if($number == "2"){
		$out = "Very good";
	} else if($number == "3"){
		$out = "Good";
	} else if($number == "4"){
		$out = "Pretty good";
	} else if($number == "5"){
		$out = "Normal";
	} else if($number == "6"){
		$out = "Average";
	} else if($number == "7"){
		$out = "Below average";
	} else if($number == "8"){
		$out = "Bad";
	} else if($number == "9"){
		$out = "Very bad";
	} else if($number == "10"){
		$out = "Extremely bad";
	}
	return $out;
}
getAirQuality();
?>