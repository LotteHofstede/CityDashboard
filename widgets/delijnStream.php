
				<div class="content">
					<?php
						$url = "../data/twitter/streams/delijn/delijn_tweets.json";
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						for ($i = 1; $i<6; $i++){
							$date = $arrayData['tweet' . $i]['date'];
							$msg = $arrayData['tweet' . $i]['text'];
							$link = $arrayData['tweet' . $i]['link'];
							if(strlen($msg)>40){
								echo '<div title="' . $msg . '" id="delijnTweet' . $i . '" class="delijnTweet">';
									echo substr($msg,0,40);
								echo '...</div>';
							} else {
								echo '<div title="' . $msg . '" id="delijnTweet' . $i . '" class="delijnTweet">';
									echo $msg;
								echo '</div>';

							}
						}
					?>
				</div>
