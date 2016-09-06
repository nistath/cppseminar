var map;
var marker;

function initialization (){
	map = new google.maps.Map(document.getElementById('location_map'), {
		center: {lat: 38, lng: 23.5},
		zoom: 9,
		mapTypeId: google.maps.MapTypeId.HYBRID
	});

	var icon = {
		path: 'M0-48c-9.8 0-17.7 7.8-17.7 17.4 0 15.5 17.7 30.6 17.7 30.6s17.7-15.4 17.7-30.6c0-9.6-7.9-17.4-17.7-17.4z',
		fillColor: '#EC407A',
		fillOpacity: 0.95,
		scale: 0.50,
		strokeColor: '#263238',
		strokeWeight: 3
	};

	marker = new google.maps.Marker({
		position: {lat: 37.9839, lng: 23.7294},
		icon: icon,
		draggable: false,
		map: map
	});
	
	loadDone();
}

function updateMarkerPosition( coords ){
	marker.setPosition(coords);
	map.panTo(coords);
}