<!-- CHECK IF SESSION EXISTS AND GET CITY -->
<?php
session_set_cookie_params(0);
session_start();
require_once("../php/urlHelper.php");

if(isset($_SESSION['hasPos'])){
    //do nothing
} else {
    header('Location: ../intro/index.php');
}

$city = $_SESSION['city'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>City Dashboard - <?php echo ucfirst($city);?></title>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="../js/packery.pkgd.min.js"></script>
    <script src="../js/draggabilly.pkgd.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&sensor=false"></script>
    <script src="../js/main.js"></script>
    <script src="../js/contentLoader.js"></script>
    <link type="text/css" rel="stylesheet" href="../css/reset.css">
    <link type="text/css" rel="stylesheet" href="../css/desktop.css" media="screen">
    <link type="text/css" rel="stylesheet" href="../css/mobile.css" media="screen and (max-width: 1100px)">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Average+Sans|Titillium+Web|Anaheim|Noto+Serif">
    <script>
        latitude = <?php echo $_SESSION['latitude'];?>; //Used for map-canvas
        longitude = <?php echo $_SESSION['longitude'];?>;
    </script>
</head>
<body>
<!-- PAGE HEADER -->
<header>
    <span id="city"><?php echo strtoupper($city);?></span>
    <div id="clock"></div>
    <span id="date"><?php echo date("d/m/Y");?></span>
    <span id="restart"><a href="../php/destroySession.php">restart</a></span>

</header>
<div class="packery">
    <!-- WIDGETS -->
    <?php include_once("loadWidgets.php") ?>
</div>
<footer>

</footer>
</body>
</html>