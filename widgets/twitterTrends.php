
				<div class="content">
					<?php
						session_start();
						$url = "../data/twitter/trends/trends_" . $_SESSION['city'] . ".json";
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						$i = 1;
						foreach ($arrayData as $trendje){
							echo '<div id="trend' . $i . '" class="trend">';
								echo $trendje;
							echo '</div>';
							$i++;
							if ($i == 9) {
								break;
							}
						}
					?>	
				</div>
