var map;
var markers = [];
var minDistance = 999999;
var minPoint = null;
function initMap() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            map = new google.maps.Map(document.getElementById('map'), {
                center: pos,
                zoom: 15
            });

            var marker = new google.maps.Marker({
                map: map,
                position:  pos,
                label: {text: "You are here", color: "blue"}
            });
        }, function() {
            // handleLocationError(true, marker, map.getCenter());
            // $("#latitude").val(marker.latLng.lat);
            // $("#longitude").val(marker.latLng.lat);
        });
    }else {
        // Browser doesn't support Geolocation
        var marker = new google.maps.Marker({
            map: map,
            position:  map.getCenter(),
            draggable: true
        });

        map = new google.maps.Map(document.getElementById('map'), {
            center: map.getCenter(),
            zoom: 15
        });
        $("#latitude").val(marker.latLng.lat);
        $("#longitude").val(marker.latLng.lat);
    }



    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {

            var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            downloadUrl('../controller/map-controller.php', function(data) {
                var xml = data.responseXML;
                var markers = xml.documentElement.getElementsByTagName('marker');
                var infoWindow = new google.maps.InfoWindow;
                Array.prototype.forEach.call(markers, function (markerElem) {
                    var id = markerElem.getAttribute('id');
                    var name = markerElem.getAttribute('name');
                    var address = markerElem.getAttribute('address');
                    var total = markerElem.getAttribute('total');
                    var free = markerElem.getAttribute('free');
                    var color = markerElem.getAttribute('color');

                    var point = new google.maps.LatLng(parseFloat(markerElem.getAttribute('lat')), parseFloat(markerElem.getAttribute('lng')));



                    var infowincontent = document.createElement('div');
                    var strong = document.createElement('strong');
                    strong.textContent = name;
                    infowincontent.appendChild(strong);
                    infowincontent.appendChild(document.createElement('br'));

                    var text = document.createElement('text');
                    text.textContent = address;
                    infowincontent.appendChild(text);
                    infowincontent.appendChild(document.createElement('br'));

                    var stats = document.createElement('strong');
                    stats.textContent = free + " out of " + total + " available";
                    infowincontent.appendChild(stats);


                    var btnReserve = document.createElement('button');
                    btnReserve.setAttribute("class", "btn btn-block btn-success reserve");
                    btnReserve.setAttribute("id", id);
                    btnReserve.setAttribute("free", free);
                    btnReserve.setAttribute("address", address);
                    btnReserve.setAttribute("name", name);
                    btnReserve.setAttribute("style", "{display : block, float : right}");
                    btnReserve.textContent = "Reserve";
                    infowincontent.appendChild(btnReserve);

                    // var icon = customLabel[type] || {};



                    var marker = new google.maps.Marker({
                        map: map,
                        position: point
                    });

                    var distance = getDistance(point, pos);


                    console.log(distance < minDistance);
                    if(distance < minDistance){
                        console.log("in");
                        minDistance = distance;
                        minPoint = marker;
                    }

                    marker.addListener('click', function() {
                        infoWindow.setContent(infowincontent);
                        infoWindow.open(map, marker);
                    });

                });
                minPoint.set('label', 'Closest');
            });



        }, function() {
            // handleLocationError(true, marker, map.getCenter());
            // $("#latitude").val(marker.latLng.lat);
            // $("#longitude").val(marker.latLng.lat);
        });
    }else{
        alert("Please enable geolocation");
    }




}


$(document).on("click", ".reserve", function () {
   var id = ($(this).attr('id'));
   var street = ($(this).attr('address'));
   var name =  ($(this).attr('name'));
   // window.location.replace("reserve.php?id=" + id + "&free=" + free);
   $.post("/park-king/controller/reservation-controller.php",{'reserve': true, 'id': id, 'street': street, 'name' : name}, function (res) {

       window.location.replace(res);
   })
       .fail(function (xhr, status, error) {
           alert(error);
       });
});

function downloadUrl(url,callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
        if (request.readyState === 4) {
            request.onreadystatechange = callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

var rad = function(x) {
    return x * Math.PI / 180;
};

var getDistance = function(p1, p2) {
    var R = 6378137; // Earth’s mean radius in meter
    var dLat = rad(p2.lat() - p1.lat());
    var dLong = rad(p2.lng() - p1.lng());
    var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
        Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) *
        Math.sin(dLong / 2) * Math.sin(dLong / 2);
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    var d = R * c;
    return d; // returns the distance in meter
};


