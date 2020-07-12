$(document).ready(function () {
    $.get("/park-king/controller/vehicle-controller.php", {'get-models' : true},  function (res) {
        var result = JSON.parse(res);
        // console.log(res);
        result.forEach(function (element) {
            $('#model_id').append('<option id="'+element[0]+'">'+ element[0] + ': ' + element[4] + ' ' +element[2]+'</option>');
        });
    });
});

// $('#model_id').change(function () {
//     $()
// });

$('#btnAddModel').click(function () {
    console.log($("#new_model_name").val());
    console.log($("#new_brand_name").val());
    $.post("/park-king/controller/vehicle-controller.php",
        {
            'add-model' : true,
            'new_model_name' : $("#new_model_name").val(),
            'new_brand_name' : $("#new_brand_name").val()
        }).done(function (res) {
            var result = JSON.parse(res);
            $('#model_id').append('<option id="'+result[0]+'">'+result[0]+': '+result[1]+' ' + result[2]+'</option>');
            alert("Model added successfully!");
        });
});

$('#btnSave').click(function () {
    var data = $('#form_data').serializeArray();
    data.push({name: "insert-all", value: "true"},{name:"model_id", value:$('#model_id').val().split(":")[0]});
    $.post("/park-king/controller/vehicle-controller.php", data, function (res) {
        console.log(res);
        alert("Vehicle added successfully!");
        window.location.replace("/park-king");
    }).fail(function () {
        alert("Error!");
    });
});