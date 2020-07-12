var currentLatitude;
var currentLongitude;
function initMap() {

    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            var map = new google.maps.Map(document.getElementById('map'), {
                center: pos,
                zoom: 15
            });


            var marker = new google.maps.Marker({
                map: map,
                position: pos,
                draggable: true
            });



            google.maps.event.addListener(marker, 'dragend', function(marker){
                var latLng = marker.latLng;
                currentLatitude = latLng.lat();
                currentLongitude = latLng.lng();
                $("#latitude").val(currentLatitude);
                $("#longitude").val(currentLongitude);
            });


            $("#latitude").val(pos.lat);
            $("#longitude").val(pos.lng);
        }, function() {
            handleLocationError(true, marker, map.getCenter());
            $("#latitude").val(marker.latLng.lat);
            $("#longitude").val(marker.latLng.lat);
        });
    } else {
        // Browser doesn't support Geolocation
        var marker = new google.maps.Marker({
            map: map,
            position:  map.getCenter(),
            draggable: true
        });
        $("#latitude").val(marker.latLng.lat);
        $("#longitude").val(marker.latLng.lat);
    }
}



$('#btnSave').click(function () {
    $.post( "../controller/parking-lot-controller.php", $("#form").serialize() ,
        function(output)    {
            console.log(output);
            alert("Parking lot created succesfully!");
            window.location.replace("/park-king/site/add-parking-lot.php");
        });

});

$("#tblArrangement tbody").on("click", "td", function(e) {
    var res_id=$(e.currentTarget).find('td:nth-child(1)').text();
    var res_time=$(e.currentTarget).find('td:nth-child(2)').text();
    var end_time=$(e.currentTarget).find('td:nth-child(3)').text();
    var slot_id=$(e.currentTarget).find('td:nth-child(4)').text();
    var plate_no=$(e.currentTarget).find('td:nth-child(5)').text();
    var res_type=$(e.currentTarget).find('td:nth-child(6)').text();

});