<?php
	header('Content-type: application/json');
	function getStream($city){
		if($city == "leuven"){
			$url = "https://api.twitter.com/1/statuses/user_timeline/PolitieLeuven.json";
		} else if($city == "brussel"){
			$url = "https://api.twitter.com/1/statuses/user_timeline/zpz_polbru.json";
		} else if($city == "antwerpen"){
			$url = "https://api.twitter.com/1/statuses/user_timeline/LPAntwerpen.json";
		} else {
			$url = "https://api.twitter.com/1/statuses/user_timeline/politiegent.json";
		}
		
		$jsondata = file_get_contents($url);
		$count = 1;
		$tweets = array();
		$arrayData = json_decode($jsondata, true);
		if ($arrayData === null) {
   			$tweets['tweet' . $count] = array("user"=>NULL,"date"=>NULL,"text"=>NULL);
		} else {
			foreach( $arrayData as $tweet ){
				$user = $tweet['user']['name'];
				$date = $tweet['created_at'];
				$text = $tweet['text'];
				$id = $tweet['id'];
				$tweets['tweet' . $count] = array("user"=>$user,"date"=>$date,"text"=>$text,"id"=>$id);
				$count++;
			}
			
			if (file_exists('police_tweets_' . $city . '.json')) {
			$fp = fopen('police_tweets_' . $city . '1.json', 'w');
			fwrite($fp, json_encode($tweets));
			fclose($fp);
		
			if (file_exists('police_tweets_' . $city . '1.json')) {
				unlink('police_tweets_' . $city . '.json');
				rename('police_tweets_' . $city . '1.json','police_tweets_' . $city . '.json');
			}
		} else {
    		$fp = fopen('police_tweets_' . $city . '.json', 'w');
			fwrite($fp, json_encode($tweets));
			fclose($fp);
		}
		}
	}
	
	getStream("leuven");
	getStream("brussel");
	getStream("antwerpen");
	getStream("gent");
?>