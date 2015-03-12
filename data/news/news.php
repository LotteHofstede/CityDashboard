<?php
	header('Content-type: application/json');
	
	if(isset($_GET['city'])){
		$cityGet = $_GET['city'];
	} else {
		$cityGet = "brussel";
	}
	function getNews($city){
		if($city == "leuven"){
			$url = "http://www.nieuwsblad.be/rss.aspx?intro=1&section=postcode&postcode=3000";
		} else if($city == "brussel"){
			$url = "http://www.nieuwsblad.be/rss.aspx?intro=1&section=postcode&postcode=1000";
		} else if($city == "antwerpen"){
			$url = "http://www.nieuwsblad.be/rss.aspx?intro=1&section=postcode&postcode=2000";
		} else if($city == "gent"){
			$url = "http://www.nieuwsblad.be/rss.aspx?intro=1&section=postcode&postcode=9000";
		}
		
		$rss = simplexml_load_file($url);
		$array=array();
		$count = 1;
		
		foreach($rss->channel->item as $chan) {  
        	$pubDate = $chan->pubDate . "";
        	$title = $chan->title . "";
        	$description = $chan->description . "";
        	$link = $chan->link . "";
        	$array["newsitem" . $count] = array("pubDate"=>$pubDate,"description"=>$description,"title"=>$title,"link"=>$link);
        	$count++;
		}
		
		if (file_exists('news_' . $city . '.json')) {
			$fp = fopen('news_' . $city . '1.json', 'w');
			fwrite($fp, json_encode($array));
			fclose($fp);
		
			if (file_exists('news_' . $city . '1.json')) {
				unlink('news_' . $city . '.json');
				rename('news_' . $city . '1.json','news_' . $city . '.json');
			}
		} else {
    		$fp = fopen('news_' . $city . '.json', 'w');
			fwrite($fp, json_encode($array));
			fclose($fp);
		}
	}
	
	getNews("leuven");
	getNews("gent");
	getNews("antwerpen");
	getNews("brussel");
?>