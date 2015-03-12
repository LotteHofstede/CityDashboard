<span>°c</span>
<canvas id="canvas" height="115" width="590"></canvas>
<?php
		session_start();
		$url = "../data/weather/weather_" . $_SESSION['city'] . ".json";
		$jsondata = file_get_contents($url);
		$arrayData = json_decode($jsondata, true);
	?>
	<script src="../js/chart.min.js"></script>
	<script type="text/javascript">
		var lineChartData = {
			labels : ["<?php echo date('D', $arrayData['list'][0]['dt']); ?>", 
						"<?php echo date('D', $arrayData['list'][1]['dt']); ?>",
						"<?php echo date('D', $arrayData['list'][2]['dt']); ?>",
						"<?php echo date('D', $arrayData['list'][3]['dt']); ?>",
						"<?php echo date('D', $arrayData['list'][4]['dt']); ?>",
						"<?php echo date('D', $arrayData['list'][5]['dt']); ?>",
						"<?php echo date('D', $arrayData['list'][6]['dt']); ?>"],
			
			datasets : [
				{
					fillColor : "rgba(209,224,0,0.2)",
					strokeColor : "#d1e000",
					pointColor : "#d1e000",
					data : [<?php echo $arrayData['list'][0]['temp']['day'];?>,
							<?php echo $arrayData['list'][1]['temp']['day'];?>,
							<?php echo $arrayData['list'][2]['temp']['day'];?>,
							<?php echo $arrayData['list'][3]['temp']['day'];?>,
							<?php echo $arrayData['list'][4]['temp']['day'];?>,
							<?php echo $arrayData['list'][5]['temp']['day'];?>,
							<?php echo $arrayData['list'][6]['temp']['day'];?>]
				}
			]

		}
		
		var options = {
			scaleShowGridLines : false,
			scaleFontColor : "#fff",
			scaleOverlay : true,
			scaleLabel : "<%=value%>",
			pointDotRadius : 2
		}

	var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData,options);
	</script>
	