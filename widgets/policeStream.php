
				<div class="content">
					<?php
						session_start();
						$url = "../data/twitter/streams/police/police_tweets_" . $_SESSION['city'] . ".json";
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						for ($i = 1; $i<6; $i++){
							$date = $arrayData['tweet' . $i]['date'];
							$msg = $arrayData['tweet' . $i]['text'];
							if(strlen($msg)>40){
								echo '<div title="' . $msg . '" id="polTweet' . $i . '" class="polTweet">';
									echo substr($msg,0,40);
								echo '...</div>';
							} else {
								echo '<div title="' . $msg . '" id="polTweet' . $i . '" class="polTweet">';
									echo $msg;
								echo '</div>';

							}
						}
					?>
				</div>
