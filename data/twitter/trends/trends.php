<?php
	include_once('../../../php/simple_html_dom.php');
	header('Content-type: application/json');
	$city = $_GET['city'];
	
	function getTrends($city){
		if($city == "leuven"){
			$html = file_get_html("http://trendsmap.com/local/be/leuven");
		} else if($city == "brussel"){
			$html = file_get_html("http://trendsmap.com/local/be/brussels");
		} else if($city == "antwerpen"){
			$html = file_get_html("http://trendsmap.com/local/be/antwerp");
		} else if($city == "gent"){
			$html = file_get_html("http://trendsmap.com/local/be/gent");
		}
		
		$trends = array();
		
		for($i=0;$i<10;$i++){
			$divId = "#local_topic_title_" . $i;
			$trend = $html->getElementById($divId)->innertext;
			if($trend != NULL){
				$trends["trend" . ($i+1)] = $trend;
			}
		}
		
		if (file_exists('trends_' . strtolower($city) . '.json')) {
			$fp = fopen('trends_' . strtolower($city) . '1.json', 'w');
			fwrite($fp, json_encode($trends));
			fclose($fp);
		
			if (file_exists('trends_' . strtolower($city) . '1.json')) {
				unlink('trends_' . strtolower($city) . '.json');
				rename('trends_' . strtolower($city) . '1.json','trends_' . strtolower($city) . '.json');
			}
		} else {
    		$fp = fopen('trends_' . strtolower($city) . '.json', 'w');
			fwrite($fp, json_encode($trends));
			fclose($fp);
		}
	}
	
	getTrends("leuven");
	getTrends("brussel");
	getTrends("antwerpen");
	getTrends("gent");
?>