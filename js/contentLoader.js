$(window).ready(function(){

	//LOAD WIDGETS, COUNTDOWN TIMER, SET REFRESH TIME, ..
	$.getScript('../js/countdown.js');

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
        $('html').css( 'cursor', 'default' );

	});

        //[widget id, file path, update interval];
    var widgets = [
        ["weather", "../widgets/weather.php", 0, "collapse"],
        //["forecast", "../widgets/forecast.php", 0, "collapse"], problematic one
        ["bus", "../widgets/bus.php", 60],
        ["air", "../widgets/air.php", 0],
        ["twitterTrends", "../widgets/twitterTrends.php", 3600],
        ["bikes", "../widgets/bikes.php", 3600],
        ["wikipedia", "../widgets/wikipedia.php", 0],
        ["cars", "../widgets/cars.php", 3600],
        ["news", "../widgets/news.php", 1800],
        ["events", "../widgets/events.php", 0, "collapse"],
        ["trafficCams", "../widgets/trafficCams.php", 120],
        ["commentBox", "../widgets/commentBox.php", 0],
        ["policeTweets", "../widgets/policeStream.php", 1800],
        ["delijnTweets", "../widgets/delijnStream.php", 1800],
        ["instagram", "../widgets/instagram.php", 1800],
        ["foursquare", "../widgets/foursquare.php", 1800],
        ["latestTweets", "../widgets/latestTweets.php", 1800]
    ];

    for (var i = 0 ; i <widgets.length; i++) {
        loadWidget(widgets[i])
    }


    var secondsPassed = 0;
    setInterval(function() {secondsPassed++;}, 1000);

    function loadWidget(widget) {

        var element = widget[0];
        var loc = widget[1];
        var content = "#" + element + " .content";
        if (widget[2] > 0) {
            $(content).load(loc, loadWidgetsWithInterval(widget));
        } else if (widget[3] == "collapse") {
            $(content).load(loc + ' #start', loadCollapsableWidget(widget));
        } else {
            $(content).load(loc);
        }
    }

    function loadCollapsableWidget(widget) {
        var loc = widget[1];
        var element = "#" + widget[0];
        $(element + ' .footer').html('click for more info');
        $(element).click(function() {
            alterClass(element, loc);
            }
        );
    }

    function alterClass(element, loc){
        if ($(element).hasClass('more')){
            $(element).removeClass('more');
            $(element + ' .content').load(loc + ' #start');
            $(element + ' .footer').html('click for more info');
        } else {
            $(element).addClass('more');
            $(element + ' .content').load(loc + ' #more');
            $(element + ' .footer').html('back');
        }
    }

    function loadWidgetsWithInterval(widget) {

            var element = widget[0];
            var countdown = widget[2];
            var interval = countdown * 1000;
            widget[2] = 0;

            setInterval(function() {loadWidget(widget);}, interval);
            setInterval(function() {secondPassed(element, countdown);}, 1000);
    }


    function secondPassed(element, seconds) {
        var elementFound = document.getElementById(element);
        if (elementFound != null) {
            var countdownEl = elementFound.getElementsByClassName("timer")[0];
            if (countdownEl!=null) {
                countdownEl.innerHTML = ((seconds-secondsPassed)+seconds)%seconds;
            }
        }
    }


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

        
    }
);
