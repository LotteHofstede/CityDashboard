<div class="content">
					<?php
						session_start();
						$url = "../data/airquality/airQuality_" . $_SESSION['city'] . ".json";
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						$global = $arrayData["globals"]["status"];
						if($arrayData["globals"]["number"] <= 5){
							$globalColor = '#70a112';
						} else {
							$globalColor = '#ae3f09';
						}
						
						$o3 = $arrayData[o3][status];
						if($arrayData[o3][number] <= 5){
							$o3Color = '#70a112';
						} else {
							$o3Color = '#ae3f09';
						}
						
						$no2 = $arrayData[no2][status];
						if($arrayData[no2][number] <= 5){
							$no2Color = '#70a112';
						} else {
							$no2Color = '#ae3f09';
						}
						
						$so2 = $arrayData[so2][status];
						if($arrayData[so2][number] <= 5){
							$so2Color = '#70a112';
						} else {
							$so2Color = '#ae3f09';
						}
					
						$pm10 = $arrayData[pm10][status];
						if($arrayData[pm10][number] <= 5){
							$pm10Color = '#70a112';
						} else {
							$pm10Color = '#ae3f09';
						}
					?>
						<div class="propertie" style="background-color:<?php echo $globalColor;?>">
							<div class="airTitle">General<br></div>
							<?php echo $global;?>
						</div>
						<div class="propertie" style="background-color:<?php echo $o3Color;?>">
							<div class="airTitle">O3<br></div>
							<?php echo $o3;?>
						</div>
						<div class="propertie" style="background-color:<?php echo $no2Color;?>">
							<div class="airTitle">NO2<br></div>
							<?php echo $no2;?>
						</div>
						<div class="propertie" style="background-color:<?php echo $so2Color;?>">
							<div class="airTitle">SO2<br></div>
							<?php echo $so2;?>
						</div>
						<div class="propertie" style="background-color:<?php echo $pm10Color;?>">
							<div class="airTitle">PM10<br></div>
							<?php echo $pm10;?>
						</div>
				</div>

