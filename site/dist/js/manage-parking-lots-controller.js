$("#tblLot tbody").on("click", "tr", function(e) {
    var lot_id=$(e.currentTarget).find('td:nth-child(1)').text();
    var lot_name=$(e.currentTarget).find('td:nth-child(2)').text();
    var no=$(e.currentTarget).find('td:nth-child(3)').text();
    var street=$(e.currentTarget).find('td:nth-child(4)').text();
    var city=$(e.currentTarget).find('td:nth-child(5)').text();
    var tot_slots=$(e.currentTarget).find('td:nth-child(6)').text();
    var empty_slots=$(e.currentTarget).find('td:nth-child(7)').text();

    $("#lot_id").val(lot_id);
    $("#lot_name").val(lot_name);
    $("#no").val(no);
    $("#street").val(street);
    $("#city").val(city);
    $("#tot_slots").val(tot_slots);
    $("#empty_slots").val(empty_slots);

});

$("#btnDelete").click(function () {
    if(confirm("Are you sure you want to delete this parking lot?")){
        $.ajax({
            method: 'GET',
            url : '../controller/parking-lot-controller.php',
            aysnc: true,
            dataType: 'JSON',
            data: {
                delete : true,
                id : $("#lot_id").val()
            }
        }).done(function (response) {
            alert("Parking lot removed succesfuly!");
            loadData();
        }).fail(function (res) {
            console.log(res.responseText)
        })
    }

});

$("#btnSave").click(function () {
    if(confirm("Are you sure you want to update this parking lot?")){
        $.ajax({
            method: 'POST',
            url : '../controller/parking-lot-controller.php',
            aysnc: true,
            dataType: 'JSON',
            data: {
                update : true,
                id : $("#lot_id").val(),
                name: $("#lot_name").val(),
                no: $("#no").val(),
                street: $("#street").val(),
                city: $("#city").val(),
                tot_slots: $("#tot_slots").val(),
                empty_slots: $("#empty_slots").val()
            }
        }).done(function (response) {
            alert("Parking lot updated succesfuly!");
            loadData();
        }).fail(function (res) {
            console.log(res.responseText)
        })
    }

});

var loadData = function () {
    $.ajax({
        method: 'GET',
        url : '../controller/parking-lot-controller.php',
        aysnc: true,
        dataType: 'JSON',
        data: {
            all : true
        }
    }).done(function (response) {
        $("#lotBody tr").remove();
        response.forEach(function (element) {
            $("#lotBody").append(
                "<tr> <td>" + element[0] +"</td> <td>"+ element[1] +"</td> <td>"+ element[2] +"</td> <td>"+ element[3] +"</td> <td>"+ element[4] +"</td>  <td>"+ element[8] +"</td>  <td>"+ element[9] +"</td>" +
                "</tr>"
            );
        });

    }).fail(function (res) {
        console.log(res);
    });

    $("#lot_id").val("");
    $("#lot_name").val("");
    $("#no").val("");
    $("#street").val("");
    $("#city").val("");
    $("#tot_slots").val("");
    $("#empty_slots").val("");
};

$(document).load(
    loadData()
);

