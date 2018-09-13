
var update=false;
$(document).ready(loadAllCustomers);

function loadAllCustomers(){


    var ajaxConfig = {
        method: "GET",
        url:"api/customer.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function(response){
        response.forEach(function (customer){

            var html = "<tr>" +
                "<td>" + customer.cusid + "</td>" +
                "<td>" + customer.cusname + "</td>" +
                "<td>" + customer.cusaddress + "</td>" +
                "<td>"+customer.cuscontact+"</td>"+
                "<td>"+customer.nicno+"</td>"+
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";


            $("#tblCustomers tbody").append(html);

            $(".recycle").off();
            $(".recycle").click(function(){

                var customerID = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")){

                    $.ajax({
                        method:"DELETE",
                        url:"api/customer.php?id=" + customerID,
                        async: true
                    }).done(function(response){
                       if (response){
                           alert("Customer has been successfully deleted");
                           $("#tblCustomers tbody tr").remove();
                           loadAllCustomers();
                       } else{
                           alert("Failed to delete the customer");
                       }
                    });

                }

            });
       });
    });

}



// $("#tblCustomers tbody tr").click(function () {
//     var nicvalue= ($(this).parents("tr").find("td:nth-child(5)").text());
//
//     $.ajax({
//         method:"UPDATE",
//         url:"api/customer.php?id=" + nicvalue,
//         async: true
//     }).done(function(response){
//         if (response){
//             alert("Customer has been successfully deleted");
//             $("#tblCustomers tbody tr").remove();
//             loadAllCustomers();
//         } else{
//             alert("Failed to delete the customer");
//         }
//     });
//
//

// })


$(document).on("click","#tblCustomers tbody tr", function () {
    // $("#btnCustomer").text("Update");
    update=true;
    $("#cid").val($(this).find("td:nth-child(1)").text());
    $("#cname").val($(this).find("td:nth-child(2)").text());
    $("#caddress").val($(this).find("td:nth-child(3)").text());
    $("#ccontact").val($(this).find("td:nth-child(4)").text());
    $("#cnic").val($(this).find("td:nth-child(5)").text());

});


$("#btnCustomer").click(loadcustomer);

function loadcustomer() {

if(update==false){

        var ajaxConfig = {
            method: "POST",
            url: "api/customer.php?action=save",
            data: $("#customerform").serialize() + "&action=save",
            async: true
        }

        console.log(ajaxConfig);

        $.ajax(ajaxConfig).done(function (response) {
            if (response) {
                alert("Customer is successfully saved");
                $("#tblCustomers tbody tr").remove();
                loadAllCustomers();
                $("#cid").val("");
                $("#cname").val("");
                $("#caddress").val("");
                $("#ccontact").val("");
                $("#cnic").val("");
            } else {
                alert("Failed to save the customer ");
                $("#cid").val("");
                $("#cname").val("");
                $("#caddress").val("");
                $("#ccontact").val("");
                $("#cnic").val("");
            }
        })


}else if(update==true){

        var ajaxConfig = {
            method: "POST",
            url: "api/customer.php?action=update",
            data: $("#customerform").serialize() + "&action=update",
            async: true
        }

        console.log(ajaxConfig);

        $.ajax(ajaxConfig).done(function (response) {
            if (response) {
                alert("Customer is successfully updated");
                $("#tblCustomers tbody tr").remove();
                loadAllCustomers();
                $("#cid").val("");
                $("#cname").val("");
                $("#caddress").val("");
                $("#ccontact").val("");
                $("#cnic").val("");
               update=false;

            } else {
                alert("Failed to update the customer ");
                $("#cid").val("");
                $("#cname").val("");
                $("#caddress").val("");
                $("#ccontact").val("");
                $("#cnic").val("");
               update=false;
            }
        })

    }

}
