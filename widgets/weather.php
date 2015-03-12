<div id="basic">
				<div class="content">
					<?php
						session_start();
						$url = "../data/weather/weather_" . $_SESSION['city'] . ".json";
						$jsondata = file_get_contents($url);
						$arrayData = json_decode($jsondata, true);
						
						$temp = round($arrayData['list'][0]['temp']['day']);
						$tempMin = round($arrayData['list'][0]['temp']['min']);
						$tempMax = round($arrayData['list'][0]['temp']['max']);
						$humidity = round($arrayData['list'][0]['humidity']);
						$pressure = round($arrayData['list'][0]['pressure']);
						$rain = round($arrayData['list'][0]['rain']);
						$speed = round($arrayData['list'][0]['speed']);
						
						$description = $arrayData['list'][0]['weather'][0]['description'];
						$imgCode = $arrayData['list'][0]['weather'][0]['icon'];
					?>
					<div id="temp">
						<?php echo $temp; ?><span id="celsius">°c</span>
					</div>
				</div>
</div>



<div id="detail">
	<div id="weatherIcon">
		<img src="../weather/<?php echo $imgCode; ?>.png"></img>
	</div>
	<div id="moreInfo">
						<div class="part" title="Temperature">
							<div class="title">
								temp
							</div>
							<div class="value">
								<?php echo $temp; ?><span class="small">°c</span>
							</div>
						</div>
						<div class="part" title="Rain level">
							<div class="title">
								rain
							</div>
							<div class="value">
								<?php echo $rain; ?><span class="small">mm</span>
							</div>
						</div>
						<div class="part" title="Humidity">
							<div class="title">
								humidity
							</div>
							<div class="value">
								<?php echo $humidity; ?><span class="small">%</span>
							</div>
						</div>
						<div class="part" title="Wind speed">
							<div class="title">
								wind
							</div>
							<div class="value">
								<?php echo $speed; ?><span class="small">km/h</span>
							</div>
						</div>
						<div class="part" title="Pressure">
							<div class="title">
								pressure
							</div>
							<div class="value small">
								<?php echo $pressure; ?><span class="small">hPa</span>
							</div>
						</div>
					</div>
</div>
