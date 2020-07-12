$("#btnAllItem").click(function () {
    viewAll();
});




function viewAll() {


    $.ajax({
        method: 'GET',
        url : '../../../controller/item-controller.php?all=true',
        aysnc: true
    }).done(function(response){

        $("#tblItem tbody tr").remove();

        var items = JSON.parse(response);

        console.log(items);

        for(var i=0; i< items.length; i++){

            var rowData = "<tr onclick='editItem("+items[i][0]+")'>" +
                "<td >"+ items[i][0] +"</td>" +
                "<td>"+ items[i][1] +"</td>" +
                "<td>"+ items[i][2] +"</td>" +
                "<td>"+ items[i][3] +"</td>" +
                "</tr>"

            $("#tblItem tbody").append(rowData);

        }




    });

    }


function showmessage(message) {


    var mdiv="<div id='aleart' class='alert alert-primary' role='alert'> "+message+" Thank You for Sale With Us</div>";

    $('#sec').prepend(mdiv);
    setTimeout(function () {
        $('#alerts').fadeOut();
        setTimeout(function () {
            $('#alerts').remove();
        },500);

    },500);


}



function editItem(id) {


    $.ajax({
        method: 'GET',
        url : '../../../controller/item-controller.php?search='+id,
        aysnc: true
    }).done(function(response){

        console.log("response is==",response);

        var item = JSON.parse(response);

        $('#itemId').val(item[0]);
        $('#itemName').val(item[1]);
        $('#quantity').val(item[2]);
        $('#unitPrice').val(item[3]);

    });


}

$('#btnDeleteItem').click(function () {

    $.ajax({
        method: 'GET',
        url : '../../../controller/item-controller.php?deleteItem='+$('#itemId').val(),
        aysnc: true
    }).done(function(response){


        // showmessage(response);

        console.log("response is==",response);

        var items = JSON.parse(response);
        console.log(items);

        viewAll();
    });

});

$('#btnSave').click(function () {

    viewAll();

});












