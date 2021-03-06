		var map;
		var markers = [];

		function initMap() {
			var persani = {lat: -7.284933, lng: 112.650633};

			map = new google.maps.Map(document.getElementById('map'), {
				zoom: 13,
				center: persani
			});

		  // This event listener will call addMarker() when the map is clicked.
		  map.addListener('click', function(event) {
		  	deleteMarkers();
		  	addMarker(event.latLng);		  	
		  	// window.location="http://localhost:8000/sarpras/" + event.latLng.lat() + "/edit";
		  	$('#latitude').val(event.latLng.lat());
		  	$('#longitude').val(event.latLng.lng());
		  });

		  // Adds a marker at the center of the map.
		  // addMarker(persani);
		}

		// Adds a marker to the map and push to the array.
		function addMarker(location) {
			var marker = new google.maps.Marker({
				position: location,
				map: map
			});
			markers.push(marker);
		}

		// Sets the map on all markers in the array.
		function setMapOnAll(map) {
			for (var i = 0; i < markers.length; i++) {
				markers[i].setMap(map);
			}
		}

		// Removes the markers from the map, but keeps them in the array.
		function clearMarkers() {
			setMapOnAll(null);
		}

		// Shows any markers currently in the array.
		function showMarkers() {
			setMapOnAll(map);
		}

		// Deletes all markers in the array by removing references to them.
		function deleteMarkers() {
			clearMarkers();
			markers = [];
		}