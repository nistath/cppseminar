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
		draggable: true,
		map: map
	});

    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    $('#pac-input').val('');

	searchBox.addListener('places_changed', function() {
		var places = searchBox.getPlaces();

		if (places.length == 0) return;

		places.forEach(function(place) {
			updateMarkerPosition( place.geometry.location );
		});

		map.panTo(marker.position);
	});


	updateInputs(marker.position);
	marker.addListener('drag', function() {
		updateInputs(marker.position);
	});

	google.maps.event.addListener(map, 'click', function(event) {
		updateMarkerPosition(event.latLng);
	});

	loadDone();
}

function updateMarkerPosition( coords ){
	marker.setPosition(coords);
	updateInputs(coords);
	map.panTo(marker.position);
}

function updateInputs( coords ){
	$('#latitude').val(coords.lat);
	$('#longitude').val(coords.lng);
}