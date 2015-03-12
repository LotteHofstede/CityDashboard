var mapCenter = new google.maps.LatLng(50.999929,4.248962);

var myOptions = {
	zoom: 9,
	center: mapCenter,
	mapTypeId: google.maps.MapTypeId.ROADMAP,
	disableDefaultUI: true,
	zoomControl: true,
	streetViewControl: true,
	draggableCursor:'pointer'
}

var styles = [
	{
		featureType: "poi",
		stylers: [
			{ visibility: "off" }
		]
	}
];

var map = new google.maps.Map(document.getElementById('map-map'), myOptions);
map.setOptions({styles: styles});

google.maps.event.addListener(map, 'click', function(event) {
	placeMarker(event.latLng);
});

var marker;
var markers = new Array();
var markerLat;
var markerLng;

function placeMarker(location) {
	if(markers.length<1){
		defineMarker(location);
	} else {
		clearMarker();
		defineMarker(location);
	}
	markerLat = marker.position.lat();
	markerLng = marker.position.lng();
	geocodePosition(marker.getPosition());

}

function defineMarker(location){
	marker = new google.maps.Marker({
		position: location, 
		map: map,
	});
	markers.push(marker);
}

function clearMarker(){
	marker.setMap(null);
	markers.splice(0,1);
	markerLat = null;
	markerLng = null;
	document.getElementById('address').innerHTML = "Please pin your approximate location on the map.";
}

var geocoder = new google.maps.Geocoder();

function geocodePosition(pos) {
  geocoder.geocode({
    latLng: pos
  }, function(responses) {
    if (responses && responses.length > 0) {
      updateMarkerAddress(responses[0].formatted_address);
    } else {
      updateMarkerAddress('No information available about this location.');
    }
  });
}

function updateMarkerAddress(str) {
	document.getElementById('address').style.display = 'block';
  document.getElementById('address').innerHTML = str;
}

	// Add dragging event listeners.
  google.maps.event.addListener(marker, 'dragstart', function() {
    updateMarkerAddress('Dragging...');
  });
  
  google.maps.event.addListener(marker, 'dragend', function() {
    geocodePosition(marker.getPosition());
  });