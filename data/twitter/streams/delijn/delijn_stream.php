<?php
	header('Content-type: application/json');
	function getStream(){
		$url = "https://api.twitter.com/1/statuses/user_timeline/delijn.json";
		
		$jsondata = file_get_contents($url);
		$count = 1;
		$tweets = array();
		$arrayData = json_decode($jsondata, true);
		if ($arrayData === null) {
   			$tweets['tweet' . $count] = array("user"=>NULL,"date"=>NULL,"text"=>NULL,"link"=>NULL);
		} else {
			foreach( $arrayData as $tweet ){
				$user = $tweet['user']['name'];
				$date = $tweet['created_at'];
				$text = $tweet['text'];
				$linkId = ''.$tweet['id'];
				$link = 'https://twitter.com/delijn/status/' . $linkId;
				$tweets['tweet' . $count] = array("user"=>$user,"date"=>$date,"text"=>$text,"link"=>$link);
				$count++;
			}
			
			if (file_exists('delijn_tweets.json')) {
			$fp = fopen('delijn_tweets1.json', 'w');
			fwrite($fp, json_encode($tweets));
			fclose($fp);
		
			if (file_exists('delijn_tweets1.json')) {
				unlink('delijn_tweets.json');
				rename('delijn_tweets1.json','delijn_tweets.json');
			}
		} else {
    		$fp = fopen('delijn_tweets.json', 'w');
			fwrite($fp, json_encode($tweets));
			fclose($fp);
		}
		}
	}
	
	getStream($city);
?>