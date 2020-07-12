$("#btnAllCustomer").click(function () {
    viewAll();
});




function viewAll() {




    $.ajax({
        method: 'GET',
        url : '../../../controller/customer-controller.php?all=true',
        aysnc: true
    }).done(function(response){

        $("#tblCustomer tbody tr").remove();
        var customers = JSON.parse(response);

        console.log(customers);

        for(var i=0; i< customers.length; i++){

            var rowData = "<tr onclick='editCustomer("+customers[i][0]+")'>" +
                "<td >"+ customers[i][0] +"</td>" +
                "<td>"+ customers[i][1] +"</td>" +
                "<td>"+ customers[i][2] +"</td>" +
                "</tr>"

            $("#tblCustomer tbody").append(rowData);

        }



    });

    }


function editCustomer(id) {

    $.ajax({
        method: 'GET',
        url : '../../../controller/customer-controller.php?search='+id,
        aysnc: true
    }).done(function(response){

        console.log("response is==",response);

        var customer = JSON.parse(response);

        $('#customerId').val(customer[0]);
        $('#customerName').val(customer[1]);
        $('#contactNo').val(customer[2]);

    });


}

$('#btnDeleteCustomer').click(function () {

    $.ajax({
        method: 'GET',
        url : '../../../controller/customer-controller.php?deleteCustomer='+$('#customerId').val(),
        aysnc: true
    }).done(function(response){

        console.log("response is==",response);

        var customers = JSON.parse(response);
        console.log(customers);

        viewAll();
    });

});


$('#btnSave').click(function () {

    viewAll();

});







