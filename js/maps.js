var map;
var markers = [];
var infowindows = [];

// Add a marker to the map and push to the array.
function addMarker(location, icon, title, infowindow) {
    var marker = new google.maps.Marker({
        position: location,
        icon: icon,
        title: title,
        map: map
    });

    google.maps.event.addListener(marker, 'click', function() {

        infowindows.forEach(function(entry) {
            entry.close()
        });

        infowindow.open(map,marker);
        infowindows.push(infowindow);
    });

    markers.push(marker);
}

// Sets the map on all markers in the array.
function setAllMap(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Shows any markers currently in the array.
function showMarkers() {
    setAllMap(map);
}

function initialize() {
    map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);
}


function fixApiMarkers(){
    $.getJSON('http://verdermetjetoekomst.nl/data.php?educations='+adapter.education+'&sector='+adapter.sector+'&region='+adapter.searchLocation, function(data){
        for(var i = 0; i < data.length; i++) {

            var contentString = '<div id="content">' +
                '<div id="siteNotice">' +
                '</div>' +
                '<h1 id="firstHeading" class="firstHeading">'+data[i]['name']+'</h1>' +
                '<div id="bodyContent">' +
                '<p>Aangeboden door:<br/> <i>'+data[i]['organisation']['name']+'</i></p>' +
                '</div>' +
                '</div>';

            var infowindow = new google.maps.InfoWindow({
                content: contentString
            });

            var maplocation = new google.maps.LatLng(data[i]['location']['latitude'], data[i]['location']['longitude']);
            addMarker(maplocation, 'http://icons.iconarchive.com/icons/custom-icon-design/mono-business/48/company-building-icon.png', 'title', infowindow);

            $('#api-loader').remove();
        }
    });
}