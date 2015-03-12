
				<div class="content">
					<?php
                        session_start();
                        require_once("../php/urlHelper.php");
                        $params = array(
                            "latitude" => $_SESSION['latitude'],
                            "longitude" => $_SESSION['longitude']
                        );
                        $url = getUrl("data/foursquare/foursquare.php", $params);
						$jsondata = file_get_contents($url);
                        $arrayData = json_decode($jsondata, true);

						echo '<ul>';
						for ($i = 1; $i<9; $i++){
							$place = $arrayData['checkin' . $i]['place'];
							$count = $arrayData['checkin' . $i]['checkinsCount'];
							if(strlen($place)>18) {
								echo '<div class="checkin" title="' . $place . '">' . substr($place,0,18) . '…</div>';
							} else {
								echo '<div class="checkin" title="' . $place . '">' . $place . '</div>';
							}
							
						}
						echo '</ul>';
					?>

				</div>
