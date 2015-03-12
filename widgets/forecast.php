<?php
	session_start();
	$url = "../data/weather/weather_" . $_SESSION['city'] . ".json";
	$jsondata = file_get_contents($url);
	$arrayData = json_decode($jsondata, true);
?>
<div id="detailForecast">
		<table id="forecastTable" border="0" width="100%">
			<tr>
				<td></td>
				<td><img src="../weather/<?php echo $arrayData['list'][1]['weather'][0]['icon']; ?>.png"></img></td>
				<td><img src="../weather/<?php echo $arrayData['list'][2]['weather'][0]['icon']; ?>.png"></img></td>
				<td><img src="../weather/<?php echo $arrayData['list'][3]['weather'][0]['icon']; ?>.png"></img></td>
				<td><img src="../weather/<?php echo $arrayData['list'][4]['weather'][0]['icon']; ?>.png"></img></td>
				<td><img src="../weather/<?php echo $arrayData['list'][5]['weather'][0]['icon']; ?>.png"></img></td>
				<td><img src="../weather/<?php echo $arrayData['list'][6]['weather'][0]['icon']; ?>.png"></img></td>
			</tr>
			<tr class="days">
				<td></td>
				<td><?php echo date('D', $arrayData['list'][1]['dt']); ?></td>
				<td><?php echo date('D', $arrayData['list'][2]['dt']); ?></td>
				<td><?php echo date('D', $arrayData['list'][3]['dt']); ?></td>
				<td><?php echo date('D', $arrayData['list'][4]['dt']); ?></td>
				<td><?php echo date('D', $arrayData['list'][5]['dt']); ?></td>
				<td><?php echo date('D', $arrayData['list'][6]['dt']); ?></td>
			</tr>
			<tr class="odd">
				<td class="TDtitle">temperature</td>
				<td><?php echo round($arrayData['list'][1]['temp']['day']); ?>°c</td>
				<td><?php echo round($arrayData['list'][2]['temp']['day']); ?>°c</td>
				<td><?php echo round($arrayData['list'][3]['temp']['day']); ?>°c</td>
				<td><?php echo round($arrayData['list'][4]['temp']['day']); ?>°c</td>
				<td><?php echo round($arrayData['list'][5]['temp']['day']); ?>°c</td>
				<td><?php echo round($arrayData['list'][6]['temp']['day']); ?>°c</td>
			</tr>
			<tr>
				<td class="TDtitle">rain</td>
				<td>
				<?php 
					$rain1 = $arrayData['list'][1]['rain'];
					if($rain1 === NULL){
						echo 0 . "mm";
					} else {
						echo $rain1 . "mm";
					}
				?>
				</td>
				<td>
				<?php 
					$rain2 = $arrayData['list'][2]['rain'];
					if($rain2 === NULL){
						echo 0 . "mm";
					} else {
						echo $rain2 . "mm";
					}
				?>
				</td>
				<td>
				<?php 
					$rain3 = $arrayData['list'][3]['rain'];
					if($rain3 === NULL){
						echo 0 . "mm";
					} else {
						echo $rain3 . "mm";
					}
				?>
				</td>
				<td>
				<?php 
					$rain4 = $arrayData['list'][4]['rain'];
					if($rain4 === NULL){
						echo 0 . "mm";
					} else {
						echo $rain4 . "mm";
					}
				?>
				</td>
				<td>
				<?php 
					$rain5 = $arrayData['list'][5]['rain'];
					if($rain5 === NULL){
						echo 0 . "mm";
					} else {
						echo $rain5 . "mm";
					}
				?>
				</td>
				<td>
					<?php 
					$rain6 = $arrayData['list'][6]['rain'];
					if($rain6 === NULL){
						echo 0 . "mm";
					} else {
						echo $rain6 . "mm";
					}
				?>
				</td>
			</tr>
			<tr class="odd">
				<td class="TDtitle">humidity</td>
				<td><?php echo $arrayData['list'][1]['humidity']; ?>%</td>
				<td><?php echo $arrayData['list'][2]['humidity']; ?>%</td>
				<td><?php echo $arrayData['list'][3]['humidity']; ?>%</td>
				<td><?php echo $arrayData['list'][4]['humidity']; ?>%</td>
				<td><?php echo $arrayData['list'][5]['humidity']; ?>%</td>
				<td><?php echo $arrayData['list'][6]['humidity']; ?>%</td>
			</tr>
			<tr>
				<td class="TDtitle">wind</td>
				<td><?php echo $arrayData['list'][1]['speed']; ?> km/h</td>
				<td><?php echo $arrayData['list'][2]['speed']; ?> km/h</td>
				<td><?php echo $arrayData['list'][3]['speed']; ?> km/h</td>
				<td><?php echo $arrayData['list'][4]['speed']; ?> km/h</td>
				<td><?php echo $arrayData['list'][5]['speed']; ?> km/h</td>
				<td><?php echo $arrayData['list'][6]['speed']; ?> km/h</td>
			</tr>
		</table>
	</div>



