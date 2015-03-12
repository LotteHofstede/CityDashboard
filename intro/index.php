<?php 
	include_once('checkSession.php');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>City Dashboard</title>
	
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="../css/reset.css">
	<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400|Strait|Sintony' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" type="text/css" href="index.css">
	
	<!-- JAVASCRIPT FUNCTIONS -->
	<script type="text/javascript" src="functions.js"></script>
</head>
<body>
	<div id="loading">
		<div id="loading-text">
			How do you want your location to be determined?
		</div>
		<div id="buttons">
			<a class="button" href="javascript:automaticDetection()">Automatically</a>
			<a class="button" href="pointMap.php">Point on map</a>
		</div>
	</div>
	<div id="foot">
		Your IP-address is <?php echo $_SERVER['REMOTE_ADDR']; ?>
	</div>
</body>
</html>