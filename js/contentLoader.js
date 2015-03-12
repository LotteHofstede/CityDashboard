$(window).ready(function(){

	//LOAD WIDGETS, COUNTDOWN TIMER, SET REFRESH TIME, ..
	$.getScript('../js/countdown.js');
	

	$("#weather .content").load("../widgets/weather.php #basic", function(){
		$('#weather .footer').html('click for more info');
		$('#weather').click(function(){
    		if ($('#weather').hasClass('detail')){
    			$('#weather').removeClass('detail');
				$('#weather .content').load('../widgets/weather.php #basic');
				$('#weather .footer').html('click for more info');
			} else {
				$('#weather').addClass('detail');
				$('#weather .content').load('../widgets/weather.php #detail');
				$('#weather .footer').html('click for less info');
			}
		});
	});
  
	$("#forecast .content").load("../weather/weatherGraph.php", function(){
		$('#forecast .footer').html('click for detailed info');
		$('#forecast').click(function(){
   		 	if ($('#forecast').hasClass('big')){
    			$('#forecast').removeClass('big');
    			$('#forecast .content').load("../weather/weatherGraph.php");
    			$('#forecast .footer').html('click for detailed info');
    		} else {
				$('#forecast').addClass('big');
				$('#forecast .content').load('../widgets/forecast.php');
				$('#forecast .footer').html('click for line chart');
			}
		});
	});
  
	$('#bus .content').load('../widgets/bus.php', function(){
		var auto_refresh = setInterval(
			function () {
				$('#bus .content').load('../widgets/bus.php');
		}, 60000);
		setInterval('secondPassedBus()', 1000);
	});
  
	$("#air .content").load("../widgets/air.php");
  
	$("#twitterTrends .content").load("../widgets/twitterTrends.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#twitterTrends .content').load('../widgets/twitterTrends.php');
		}, 3600000);
		setInterval('secondPassedTrends()', 1000);
	});
  
	$("#bikes .content").load("../widgets/bikes.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#bikes .content').load('../widgets/bikes.ph');
		}, 3600000);
		setInterval('secondPassedBike()', 1000);
	});
 
	$("#wikipedia .content").load("../widgets/wikipedia.php");
  
	
  
	
   
	$("#cars .content").load("../widgets/cars.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#cars .content').load('../widgets/cars.php');
		}, 3600000);
		setInterval('secondPassedCar()', 1000);
	});
   
	
   
	$("#news .content").load("../widgets/news.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#news .content').load('../widgets/new.phps');
		}, 1800000);
		setInterval('secondPassedNews()', 1000);
	});
   
	$("#events .content").load("../widgets/events.php #start", function(){
		$('#events .footer').html('click for more events');
		$('#events').click(function(){
    		if ($('#events').hasClass('more')){
    			$('#events').removeClass('more');
				$('#events .content').load('../widgets/events.php #start');
			} else {
				$('#events').addClass('more');
				$('#events .content').load('../widgets/events.php #more');
			}
		});
	});
   
	$("#trafficCams .content").load("../widgets/trafficCams.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#trafficCams .content').load('../widgets/trafficCams.php');
		}, 120000);
		setInterval('secondPassedTrafcam()', 1000);
	});
   
	$("#commentBox .content").load("../widgets/commentBox.php");
    
	$("#policeTweets .content").load("../widgets/policeStream.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#policeTweets .content').load('../widgets/policeStream.php');
		}, 1800000);
		setInterval('secondPassedPoltweets()', 1000);
	});
     
	$("#delijnTweets .content").load("../widgets/delijnStream.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#delijnTweets .content').load('../widgets/delijnStream.php');
		}, 1800000);
		setInterval('secondPassedDelijntweets()', 1000);
	});
	
	$("#instagram .content").load("../widgets/instagram.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#instagram .content').load('../widgets/instagram.php');
		}, 1800000);
		setInterval('secondPassedInsta()', 1000);
	});
	
	$("#foursquare .content").load("../widgets/foursquare.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#foursquare .content').load('../widgets/foursquare.php');
		}, 1800000);
		setInterval('secondPassedFoursquare()', 1000);
		$('html').css( 'cursor', 'default' );
	});
	
	$("#latestTweets .content").load("../widgets/latestTweets.php", function(){
		var auto_refresh = setInterval(
			function () {
				$('#latestTweets .content').load('../widgets/latestTweets.php');
		}, 1800000);
		setInterval('secondPassedLatesttweets()', 1000);
	});
	
	//GOOGLE MAP
	function initialize() {
  var myLatlng = new google.maps.LatLng(latitude, longitude);
  
  var mapOptions = {
    zoom: 14,
    center: myLatlng,
     disableDefaultUI: true,
        	draggable: true,
        	scrollwheel: false,
        	disableDoubleClickZoom: true,
        	zoomControl: true,
        	panControl: false,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'You are here!'
  });
}

google.maps.event.addDomListener(window, 'load', initialize);
	
	
	
	//CLOCK
	var auto_refresh1 = setInterval(
		function () {
			var tdate=new Date();
      		var h=tdate.getHours().toString();
      		var m=tdate.getMinutes().toString();
      		var s=tdate.getSeconds().toString();
      		if(h.length==1) h="0"+h;
    		if(m.length==1) m="0"+m;
    		if(s.length==1) s="0"+s;
			$('#clock').html(h+":"+m+":"+s);
	}, 1000);
});