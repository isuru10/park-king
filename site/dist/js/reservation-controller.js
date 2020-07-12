$("#tableOrder tbody").on("click", "tr", function(e) {
    var res_id=$(e.currentTarget).find('td:nth-child(1)').text();
    var res_time=$(e.currentTarget).find('td:nth-child(2)').text();
    var end_time=$(e.currentTarget).find('td:nth-child(3)').text();
    var slot_id=$(e.currentTarget).find('td:nth-child(4)').text();
    var plate_no=$(e.currentTarget).find('td:nth-child(5)').text();
    var res_type=$(e.currentTarget).find('td:nth-child(6)').text();

    $("#res-time").val(res_time);
    $("#end-time").val(end_time);
    $("#slot_id").val(slot_id);
    $("#res_id").val(res_id);
    $("#plate_no").val(plate_no);
});

$("#btnDelete").click(function () {
    $.ajax({
        method: 'GET',
        url : '../controller/reservation-controller.php',
        aysnc: true,
        dataType: 'JSON',
        data: {
            delete : true,
            id : $("#res_id").val()
        }
    }).done(function (response) {
        console.log(response);
    }).fail(function (res) {
        console.log(res.responseText);
    })
});

//Timepicker
$('.timepicker').timepicker({
    showInputs: false
});



var loadData = function () {
    $.ajax({
        method: 'GET',
        url : '../controller/reservation-controller.php',
        async: true,
        dataType: 'JSON',
        data: {
            all : true
        }
    }).done(function (response) {
        console.log(response);
        $("#tableOrder tbody tr").remove();
        response.forEach(function (element) {
            $("#tableOrder tbody").append(
                "<tr> <td>" + element[0] +"</td> <td>"+ element[1] +"</td> <td>"+ element[2] +"</td> <td>"+ element[3] +"</td> " +
                "<td>"+ element[4] +"</td> " + "<td>"+ element[5] +"</td> " +
                "</tr>"
            );
        });

    }).fail(function (res) {
        console.log(res.responseText);
    })
};

$("#btnCheckIn").click(function () {
    var res_id = $("#res_id").val();
    $.post("../controller/reservation-controller.php", {update: true, res_id: res_id}, function (res) {
        console.log(res);
        loadData();
    }).fail(function (res) {
        console.log(res,responseText);
    });
});



$("#btnCheckOut").click(function () {
    var d1 = new Date();
    var d2 = new Date($("#res-time").val());
    var d3 = new Date($("#end-time").val());
    console.log("Check out!");
    var diff = 0;
    if(d3 > d1){
        diff = (d3-d2)/60000;
    }else{
        diff = (d1-d2)/60000;
    }

    console.log(d1);
    console.log(d2);
    var res_id = $("#res_id").val();
    var slot_id = $("#slot_id").val();
    var plate_no = $("#plate_no").val();
    $.get("../controller/reservation-controller.php", {delete: true, res_id: res_id, slot_id: slot_id}, function (res) {
        console.log(res);
        loadData();
        console.log(diff);
        if(diff > 0){
            diff = Math.round(diff*100)/100;
            var amount = diff*1.5;
            amount = Math.round(amount*100)/100;
            window.location.replace("/park-king/site/payment_details.php?amount=" + amount +"&time=" + diff + "&resId=" + res_id + "&plateNo=" + plate_no);
        }
    }).fail(function (res) {
        console.log(res,responseText);
    });


});


$("#btnCalc").click(function () {
    var d1 = new Date($("#res-time").val());
    var d2 = new Date($("#end-time").val());
    console.log($("#res-time").val());
    console.log($("#end-time").val());
    var diff = (d2-d1)/60000;
    console.log(diff);

    var rate = $("#rate").val();
    console.log(rate);

    $("#amount").val(rate*diff);
});
$(document).load(loadData());