
				<div class="content">
					<?php
                    session_start();
                    require_once("../php/urlHelper.php");
                    $params = array(
                        "latitude" => $_SESSION['latitude'],
                        "longitude" => $_SESSION['longitude']
                    );
                    $url = getUrl("twitter/tweets/tweets.php", $params);
                    $jsondata = file_get_contents($url);
                    $arrayData = json_decode($jsondata, true);
						
						for ($i = 1; $i<6; $i++){
							$message = $arrayData['tweet' . $i]['message'];
							if(strlen($message)>40){
								echo '<div class="tweet" title="' . $message . '">' . substr($message,0,40) . '…</div>';
							} else {
								echo '<div class="tweet" title="' . $message . '">' . $message . '</div>';
							}
						}
					?>	
				</div>
