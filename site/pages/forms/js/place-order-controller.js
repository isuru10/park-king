

var orderDetails=[];




$('#btnAdd').click(function () {

   var t=parseFloat($('#unitPrice').val())*parseFloat($('#requiredQuantity').val());
   var row=[$('#itemId').val(),$('#itemName').val(),$('#unitPrice').val(),$('#quantity').val(),$('#requiredQuantity').val(),t];

    orderDetails.push(row);
    $('#total').val(parseFloat($('#total').val())+t);


    var rowData = "<tr id="+'row'+row[0]+" onclick='editItemcart("+row[0]+")'>" +
                "<td >"+row[0] +"</td>" +
                "<td>"+ row[1] +"</td>" +
                "<td>"+ row[2] +"</td>" +
                "<td>"+ row[4] +"</td>" +
                "<td>"+ row[5] +"</td>" +
                "</tr>";

            $("#tblCart tbody").append(rowData);


});


$('#btnplaceOrder').click(function () {


    var order=[$('#orderId').val(),$('#total').val()];


    $.ajax({

        method: 'POST',
        url : '../../../controller/place-order-controller.php',
        aysnc: true,
        data: { order: order,orderDetails:orderDetails }
    }).done(function (response) {

        showmessage(response);
        console.log(response);

    });


});


function showmessage(message) {    var mdiv="<div id='aleart' class='alert alert-primary' role='alert'> "+message+" Thank You for Sale With Us</div>";

    $('#sec').prepend(mdiv);
    setTimeout(function () {
        $('#alerts').fadeOut();
        setTimeout(function () {
            $('#alerts').remove();
        },500);

    },500);


}





$('#btnDelete').click(function () {



    var rowid='#row'+$('#itemId').val();

    console.log($(rowid).remove());


});





function editItemcart(id) {


    $.ajax({
        method: 'GET',
        url : '../../../controller/item-controller.php?search='+id,
        aysnc: true
    }).done(function(response) {

        console.log("response is==", response);

        var item = JSON.parse(response);

        $('#itemId').val(item[0]);
        $('#itemName').val(item[1]);
        $('#quantity').val(item[2]);
        $('#unitPrice').val(item[3]);
        var rowid='row'+$('#itemId').val()+' >td';
        $('#requiredQuantity').val($(rowid).val());


    });


}
