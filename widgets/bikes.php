
				<div class="content">
					<?php
						session_start();
						$url = "../data/bikes/bikes_" . $_SESSION['city'] . ".json";
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						$occupation = $arrayData['occupation'];
						$total = $arrayData['total'];
						$occupied = $arrayData['occupied'];
						$available = $arrayData['available'];
					?>
						<div class="propertie">
							<div class="bikeTitle">Occupation<br></div>
							<?php echo $occupation;?>
						</div>
						<div class="propertie">
							<div class="bikeTitle">Total<br></div>
							<?php echo $total;?>
						</div>
						<div class="propertie">
							<div class="bikeTitle">Available<br></div>
							<?php echo $available;?>
						</div>
				</div>
