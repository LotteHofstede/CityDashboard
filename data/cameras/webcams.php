<?php
include_once('../../php/simple_html_dom.php');
header('Content-type: application/json');

$city = $_GET['city'];

function export_webcams_json($city){
	$ret = get_webcams($city);
	$array=array();
	$count = 1;
		
	foreach($ret as $v) {  
        $road = $v['road'];
        $link = $v['url'];
        $array["camera" . $count] = array("road"=>$road,"link"=>$link);
        $count++;
	}
	
	if (file_exists('webcams_' . $city . '.json')) {
		$fp = fopen('webcams_' . $city . '1.json', 'w');
		fwrite($fp, json_encode($array));
		fclose($fp);
		
		if (file_exists('webcams_' . $city . '1.json')) {
			unlink('webcams_' . $city . '.json');
			rename('webcams_' . $city . '1.json','webcams_' . $city . '.json');
		}
	} else {
    	$fp = fopen('webcams_' . $city . '.json', 'w');
		fwrite($fp, json_encode($array));
		fclose($fp);
	}
}

function stream_webcams($city){
	$ret = get_webcams($city);
	$array=array();
	$count = 1;
		
	foreach($ret as $v) {  
        $road = $v['road'];
        $link = $v['url'];
        $array["camera" . $count] = array("road"=>$road,"link"=>$link);
        $count++;
	}
	
	echo json_encode($array);
}

function get_webcams($city){
	if ($city == "gent"){
		$html = file_get_html('http://www.verkeerscentrum.be/verkeersinfo/camerabeelden/gent');
	
		foreach($html->find('img') as $image) {
			$url = $image->src;
			if(substr($url, 0,15) == "/camera-images/"){
				$item['url'] = 'http://www.verkeerscentrum.be' . $url;
				if(substr($url,15,9) == "Camera_36"){
					$item['road'] = "E40 Aalst";
				} else if(substr($url,15,9) == "Camera_32"){
					$item['road'] = "E40 Merelbeke";
				} else if(substr($url,15,9) == "Camera_35"){
					$item['road'] = "E40 Zwijnaarde";
				} else if(substr($url,15,9) == "Camera_34"){
					$item['road'] = "E40 Drongen";
				} else if(substr($url,15,9) == "Camera_31"){
					$item['road'] = "E17 Destelbergen";
				} else {
					$item['road'] = "E17 De Pinte";
				}
				$ret[] = $item;
			}
		}
	} else if ($city == "brussel"){
		$html = file_get_html('http://www.verkeerscentrum.be/verkeersinfo/camerabeelden/brussel');
	
		foreach($html->find('img') as $image) {
			$url = $image->src;
			if(substr($url, 0,15) == "/camera-images/"){
				$item['url'] = 'http://www.verkeerscentrum.be' . $url;
				if(substr($url,15,9) == "Camera_17"){
					$item['road'] = "Ring Groot-Bijgaarden";
				} else if(substr($url,15,9) == "Camera_18") {
					$item['road'] = "Ring Wemmel";
				} else if(substr($url,15,9) == "Camera_19") {
					$item['road'] = "Ring Grimbergen";
				} else if(substr($url,15,9) == "Camera_20") {
					$item['road'] = "Ring Vilvoorde";
				} else if(substr($url,15,9) == "Camera_21") {
					$item['road'] = "Ring Zaventem";
				} else if(substr($url,15,9) == "Camera_22") {
					$item['road'] = "Ring St. Stevens Woluwe";
				} else if(substr($url,15,9) == "Camera_23") {
					$item['road'] = "Ring Wezembeek";
				} else if(substr($url,15,9) == "Camera_24") {
					$item['road'] = "Ring Leonard";
				} else if(substr($url,15,9) == "Camera_25") {
					$item['road'] = "E40 Sterrebeek";
				} else if(substr($url,15,9) == "Camera_26") {
					$item['road'] = "E40 Ternat";
				} else if(substr($url,15,9) == "Camera_27") {
					$item['road'] = "A12 Meise";
				} else if(substr($url,15,9) == "Camera_28") {
					$item['road'] = "E19 Vilvoorde";
				} else if(substr($url,15,9) == "Camera_29") {
					$item['road'] = "E40 St. Stevens Woluwe";
				} else if(substr($url,15,9) == "Camera_30") {
					$item['road'] = "E411 Jezus-Eik";
				}
				$ret[] = $item;
			}
		}
	} else if ($city == "antwerpen"){
		$html = file_get_html('http://www.verkeerscentrum.be/verkeersinfo/camerabeelden/antwerpen');
	
		foreach($html->find('img') as $image) {
			$url = $image->src;
			if(substr($url, 0,15) == "/camera-images/"){
				$item['url'] = 'http://www.verkeerscentrum.be' . $url;
				if(substr($url,15,9) == "Camera_01"){
					$item['road'] = "Ring Merksem";
				} else if(substr($url,15,9) == "Camera_02") {
					$item['road'] = "Ring Deurne";
				} else if(substr($url,15,9) == "Camera_03") {
					$item['road'] = "Ring Antwerpen Oost";
				} else if(substr($url,15,9) == "Camera_04") {
					$item['road'] = "Ring Antwerpen Zuid";
				} else if(substr($url,15,9) == "Camera_05") {
					$item['road'] = "Ring Antwerpen Centrum";
				} else if(substr($url,15,9) == "Camera_06") {
					$item['road'] = "Ring Kennedytunnel";
				} else if(substr($url,15,9) == "Camera_07") {
					$item['road'] = "Ring Antwerpen West";
				} else if(substr($url,15,9) == "Camera_08") {
					$item['road'] = "Ring St. Anna Linkeroever";
				} else if(substr($url,15,9) == "Camera_09") {
					$item['road'] = "E19 Klein Bareel";
				} else if(substr($url,15,9) == "Camera_10") {
					$item['road'] = "E19 Antwerpen Noord";
				} else if(substr($url,15,9) == "Camera_11") {
					$item['road'] = "E313 Ranst";
				} else if(substr($url,15,9) == "Camera_12") {
					$item['road'] = "E313 Wommelgem";
				} else if(substr($url,15,9) == "Camera_13") {
					$item['road'] = "E313 Antwerpen Oost";
				} else if(substr($url,15,9) == "Camera_14") {
					$item['road'] = "E19 Wilrijk";
				} else if(substr($url,15,9) == "Camera_15") {
					$item['road'] = "E17 Parking Kruibeke";
				} else if(substr($url,15,9) == "Camera_16") {
					$item['road'] = "E17 Zwijndrecht";
				} else if(substr($url,15,9) == "Camera_41") {
					$item['road'] = "N49a Waaslandtunnel LO";
				}
				$ret[] = $item;
			}
		}
	}
	if ($html) {
        $html->clear();
    }
    unset($html);

    return $ret;
}

stream_webcams($city);
?>