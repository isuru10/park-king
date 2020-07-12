var map;
var markers = [];
function initMap() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };
        }, function() {
            handleLocationError(true, marker, map.getCenter());
            $("#latitude").val(marker.latLng.lat);
            $("#longitude").val(marker.latLng.lat);
        });
    }else {
        // Browser doesn't support Geolocation
        var marker = new google.maps.Marker({
            map: map,
            position:  map.getCenter(),
            draggable: true
        });
        $("#latitude").val(marker.latLng.lat);
        $("#longitude").val(marker.latLng.lat);
    }
    var galle = new google.maps.LatLng(6.053500, 80.221000);
    var matale = new google.maps.LatLng(7.467500, 80.623400);
    map = new google.maps.Map(document.getElementById('map'), {
        center: galle,
        zoom: 15
    });

    updateLocation();

    var origin;
    var destination = new google.maps.LatLng($("#dest_lat").val(), $("#dest_lng").val());

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            origin = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            calculateRoute(origin, destination);
        }, function() {
            handleLocationError(true, marker, map.getCenter());
        });
    }else{
        alert("Please enable geolocation and try again");
    }


}

function calculateRoute(origin, destination) {
    var directionsDisplay = new google.maps.DirectionsRenderer();
    var directionsService = new google.maps.DirectionsService();


    directionsDisplay.setMap(map);
    var request = {
        origin : origin,
        destination: destination,
        travelMode: 'DRIVING'
    };

    console.log(origin);
    console.log(destination.lat());
    directionsService.route(request, function (result, status) {
        if(status == "OK"){
            directionsDisplay.setDirections(result);
            var marker = new google.maps.Marker({
                map: map,
                position:  destination,
                label: {text: "Parking location"}
            });
        }
    });
}

function updateLocation() {
    setInterval(function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                if(markers === undefined || markers.length == 0){

                }else{
                    markers[0].setMap(null);
                    markers = [];
                }

                var pos = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var marker = new google.maps.Marker({
                    map: map,
                    position:  pos,
                    draggable: true,
                    label: {text: "You are here", color: "blue"}
                });
                markers.push(marker);
            }, function() {
                handleLocationError(true, marker, map.getCenter());
                $("#latitude").val(marker.latLng.lat);
                $("#longitude").val(marker.latLng.lat);
            });
        }else{
            alert("Please enable geolocation");
        }
    }, 800);
}

$("#btnCancel").click(function () {
    if(confirm("Are you sure? the reservation will be canceled and its not reversible")){
        var res_id = $("#res_id").val();
        var slot_id = $("#slot_id").val();
        console.log(res_id);
        console.log(slot_id);
        $.get("../controller/reservation-controller.php", {cancel: true, res_id: res_id, slot_id: slot_id}, function (res) {
            console.log(res);
            // $(document).append("<p>Your reservation has been cancelled</p>");
            window.location.replace("/park-king/site/Cancellation.php");
        }).fail(function (res) {
            console.log(res,responseText);
        });
        // ("Your reservation has been cancelled");

    }

});


