/* RUN WHEN USER WANTS AUTOMATIC DETECTION */
function automaticDetection(mode){
	var latitude;
	var longitude;
	var x = document.getElementById("loading");
	var delay = 2000;
	
	if (navigator.geolocation){
   		navigator.geolocation.getCurrentPosition(getPosition, showError);
   	} else{
   		x.innerHTML="Geolocation is not supported by this browser.";
  	}
	
	function getPosition(position) {
		latitude=  position.coords.latitude; 
		longitude = position.coords.longitude;	
		x.innerHTML="Location determined.<br>Loading city dashboard...";
		setTimeout(function(){window.location.href = "storeVisitor.php?lat=" + latitude + "&long=" + longitude + "&hasPos=1&method=autodetect";}, delay);
	}
	
	function showError(error) {	
		switch(error.code) {
			case error.PERMISSION_DENIED:
				x.innerHTML="Please allow your location to be determined.";
				setTimeout(function(){window.location.href = "index.php";}, delay);
			break;
			case error.POSITION_UNAVAILABLE:
				x.innerHTML="Location information is unavailable.<br>Please select another method.";
				setTimeout(function(){window.location.href = "index.php";}, delay);
			break;
			case error.TIMEOUT:
				x.innerHTML="The request to get user location timed out.<br>Please select another method.";
				setTimeout(function(){window.location.href = "index.php";}, delay);
			break;
			case error.UNKNOWN_ERROR:
				x.innerHTML="An unknown error occurred.<br>Please select another method.";
				setTimeout(function(){window.location.href = "index.php";}, delay);
			break;
		}
	}
}

/* RUN WHEN USER USES MAP FOR SETTING LOCATION */
function pointMap(){
	if (markerLat == null || markerLng == null){
		alert("Please select your location!")
	} else {
		window.location.href = "storeVisitor.php?lat=" + markerLat + "&long=" + markerLng + "&hasPos=1&method=pointmap";
	}
}

