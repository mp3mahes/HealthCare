
	var northEast;
	var southWest;
	var markers = [];
	var geocoder; 
	var map2;
	function initialize2() 
	{
		var mapCanvas2 = document.getElementById('map2');
		geocoder = new google.maps.Geocoder();
		var mapOptions2 = {
		  center: new google.maps.LatLng(32.815869, -96.84492499999999),
		  zoom: 12,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		}
		map2 = new google.maps.Map(mapCanvas2, mapOptions2)
		google.maps.event.addDomListener(map2, 'bounds_changed', function() {setBoundingBox(map2.getBounds());});
	}
		google.maps.event.addDomListener(window, 'load', initialize2);

	
	function move () 
	{
		clearMarkers();
		var zipCode = document.getElementById("search").value;
		geocoder.geocode( { 'address': zipCode}, function(results, status) {
		if (status == google.maps.GeocoderStatus.OK) 
		{
			//Got result, center the map and put it out there
			map2.setCenter(results[0].geometry.location);
			setBoundingBox(map2.getBounds(), function () {sendRequest();});
		} 
		else 
		{
			alert("Geocode was not successful for the following reason: " + status);
		}
		});
	}
	
	function sendRequest()
	{
		var url = "proxy.php?term=Grocery&bounds=" + southWest + "|" + northEast + "&limit=5"
		var xhr = new XMLHttpRequest();
		xhr.open("GET", url);
		xhr.setRequestHeader("Accept","application/json");
		xhr.onreadystatechange = function () {
			if (this.readyState == 4) {
			try{
				var json = JSON.parse(this.responseText);
				}
			catch (e)
			{
			alert(e);
			}
				var str = JSON.stringify(json,undefined,2);
				generateList(json);
			}
		};
		xhr.send(null);
	}
		
	function setBoundingBox(bounds, callback)
	{
		northEast = bounds.getNorthEast().toString();
		northEast = northEast.replace(/[( )]/g, '');
		southWest = bounds.getSouthWest().toString();
		southWest = southWest.replace(/[( )]/g, '');
		callback();
	}	
	
	function generateList(json)
	{
		for (var x = 0; x < json.businesses.length; x++)
		{
			addMarkers(json.businesses[x].location.coordinate.latitude, json.businesses[x].location.coordinate.longitude, json.businesses[x].name);
		}
	}
	
	function addMarkers(lattitude, longitude, name)
	{
		var myLatLng = {lat: lattitude, lng: longitude};
		var marker = new google.maps.Marker({
			position: myLatLng,
			map: map2,
			title: name
		});
		markers.push(marker);
	}

	function clearMarkers() 
	{
		for (var x = 0; x < markers.length; x++) 
		{
			markers[x].setMap(null);
		}
		markers = [];
	}
