<?php
header('Content-type: application/json');
$lat = $_GET['latitude'];
$long = $_GET['longitude'];

if(isset($_GET['max_distance'])){
	$max_distance = $_GET['max_distance'];
} else {
	$max_distance = 10000;
}

$url = "http://en.wikipedia.org/w/api.php?action=query&list=geosearch&gsradius=" . $max_distance . "&gscoord=" . $lat . "%7C" . $long . "&format=xml";
$xml = simplexml_load_file($url);

$array=array();
$count = 1;

foreach($xml->children() as $child) {
	foreach($child as $child1){
		foreach($child1 as $child2){
			$url1 = "http://en.wikipedia.org/w/api.php?action=query&prop=info&pageids=" . $child2[pageid] . "&inprop=url&format=xml";
			$xml1 = simplexml_load_file($url1);
			
			$link =  $xml1->query->pages->page->attributes()->fullurl . "";
			$title = $child2[title] . "";
			$dist = round($child2[dist]) . "m";
			
			$array["wikiItem" . $count] = array("title"=>$title,"distance"=>$dist,"link"=>$link);
        	$count++;
		}
	}
}
echo str_replace('\\/', '/', json_encode($array));
?>

