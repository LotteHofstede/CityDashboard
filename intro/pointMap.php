<?php 
	include_once('checkSession.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>City Dashboard</title>
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400|Strait|Sintony' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="pointMap.css">
	
	<!-- JQUERY -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
	
	<!-- GOOGLE MAPS -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&sensor=false"></script>
	
	<!-- JAVASCRIPT FUNCTIONS -->
	<script type="text/javascript" src="functions.js"></script>
	
</head>
<body>
	<div id="pointMap">
		<div id="map-map">
			<script type="text/javascript" src="map.js"></script>
		</div>
		<div id="address">
			Please pin your approximate location on the map.
		</div>
		<div id="buttons">
			<a class="button" href="javascript:pointMap()">Continue</a>
			<a class="button" href="index.php">Go back</a>
		</div>
	</div>
	<div id="foot">
		Your IP-address is <?php echo $_SERVER['REMOTE_ADDR']; ?>
	</div>
</body>
</html>