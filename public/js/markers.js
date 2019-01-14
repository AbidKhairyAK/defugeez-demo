var markerIcon = L.Icon.extend({
    options: {
        shadowUrl:    '../img/app/marker-shadow.png',
        iconSize:     [40, 40],
        shadowSize:   [50, 30],
        iconAnchor:   [20, 40],
        shadowAnchor: [20, 30],
        popupAnchor:  [0, -30]
    }
});

var greenIcon = new markerIcon({iconUrl: '../img/app/marker-green.png'}),
    redIcon = new markerIcon({iconUrl: '../img/app/marker-red.png'}),
    yellowIcon = new markerIcon({iconUrl: '../img/app/marker-yellow.png'}),
    blueIcon = new markerIcon({iconUrl: '../img/app/marker-blue.png'});