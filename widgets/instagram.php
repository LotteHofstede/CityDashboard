
				<div class="content">
					<?php
                       session_start();
                        require_once("../php/urlHelper.php");
                        $params = array(
                            "latitude" => $_SESSION['latitude'],
                            "longitude" => $_SESSION['longitude']
                        );
						$url = getUrl("data/instagram/instagram.php", $params);
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);

						for ($i = 1; $i<3; $i++){
							$picture = $arrayData['picture' . $i]['url'];
							$date = $arrayData['picture' . $i]['date'];
							if (@GetImageSize($picture)) {
								$picture = $arrayData['picture' . $i]['url'];
							} else {
								$picture = "../img/instaOffline.png";
							}
							echo '<img class="insta" src="' . $picture . '" title="' . $date . '"></img>';
							
						}
						
					?>	
				</div>
