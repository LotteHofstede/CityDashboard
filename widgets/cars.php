
				<div class="content">
					<?php
						session_start();
						$url = "../data/cambiocars/cars_" . $_SESSION['city'] . ".json";
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						$totalCarCount = $arrayData['totalCarCount'];
					?>
						<div class="propertie">
							<div class="carTitle">Available<br></div>
							<?php echo $totalCarCount;?>
						</div>
				</div>
