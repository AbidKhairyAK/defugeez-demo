var mymap = L.map('map').setView([-1.502592, 116.822409], 5);

var map =  L.tileLayer('https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png', {
	maxZoom: 18,
	attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
});

	L.marker([-1.090675, 118.873786]).addTo(mymap)
		.bindPopup("<b>TSUNAMI ACEH</b><br />Posko 120").openPopup();

	L.marker([-1.090675, 114.873782]).addTo(mymap)
		.bindPopup("<b>GEMPA BANTUL</b><br />Posko 2.").openPopup();

	L.marker([-7.090675, 119.873782]).addTo(mymap)
		.bindPopup("<b>GEMPA DODIL</b><br />Posko 2.").openPopup();

map.addTo(mymap);
