var map;
var refugees = [];

function initialization (){
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 38, lng: 23.5},
		zoom: 9
	});
	var pathArray = window.location.pathname.split( '/' );

	$.ajax({
		method: "GET",
		url: "/api/refugees/" + pathArray[2]
	})
	.done(function( json ) {
		$.each(json, function() {
			var fillColor = "#795548";
			var icon = {
				path: 'M0-48c-9.8 0-17.7 7.8-17.7 17.4 0 15.5 17.7 30.6 17.7 30.6s17.7-15.4 17.7-30.6c0-9.6-7.9-17.4-17.7-17.4z',
				fillColor: fillColor,
				fillOpacity: 0.95,
				scale: 0.40,
				strokeColor: '#263238',
				strokeWeight: 3
			};
			var marker = new google.maps.Marker({
				hub: this['id'],
				position: {lat: this['latitude'], lng: this['longitude']},
				icon: icon,
				draggable: false,
				map: map
			});
			refugees.push(marker);
		});
    });
}