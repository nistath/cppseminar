var map;
var hubs = [];

function initialization (){
	map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 38, lng: 23.5},
		zoom: 9
	});

	$.ajax({
		method: "GET",
		url: "/api/hubs"
	})
	.done(function( json ) {
		$.each(json, function() {
			var fillColor = "#607D8B";
			if (this['active'] == false) fillColor = "#FF9800";
			if (this['active'] == true) fillColor = "#4CAF50";
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
			marker.addListener('click', function() {
				var element = $("tr").filter('[data-hub="' + marker.hub + '"]');
				$("tr").removeClass('active');
				element.addClass('active');
			});
			marker.addListener('dblclick', function() {
				$("tr").removeClass('active');
				window.open('/hubs/' + marker.hub);
			});
			hubs.push(marker);
		});
    });
}