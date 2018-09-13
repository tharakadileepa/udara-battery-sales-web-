var total=0;


$(document).ready(loadallnames());
$(document).ready(loadallbatterys());

$("#btnsaveorder").click(function () {

    var a=$("#batteryCode").val();
    var b=$("#batteryType").val();
    var c=$("#batteryCat").val();
    var d=$("#batteryPrice").val();

    var html="<tr><td>"+a+"</td><td>"+b+"</td><td>"+c+"</td><td>"+d+"</td><td class='recycle'>"+"<i class='fa fa-2x fa-trash'></i>"+"</td></tr>";

    $("#tblOrder").append(html);

    total=total + parseInt(d);

    $("#textTotal").val(total);

    $("#batteryCode").val("");
    $("#batteryType").val("");
    $("#batteryCat").val("");
    $("#batteryPrice").val("");

});



        function loadallnames() {
            var ajaxConfig = {
                method: "GET",
                url:"api/customer.php?action=all",
                async: true
            };

            $.ajax(ajaxConfig).done(function(response){
                response.forEach(function (customer) {
                    var html =
                        '<option value="' + customer.cusid + '">' + customer.cusid + '</option>';
                    $("#cid").append(html);

                    var cusid = customer.cusid;



                    $("#cid").click(function () {


                            if ($("#cid :selected").val()==cusid ){
                                $("#customerName").val(customer.cusname);
                                $("#ccontact").val(customer.cuscontact);

                            }

                        });

                });
            });
        }

function loadallbatterys() {
    var ajaxConfig = {
        method: "GET",
        url:"api/Item.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function(response){
        response.forEach(function (battery) {
            var html =
                '<option value="' + battery.bcode + '">' + battery.bcode + '</option>';
            $("#batteryCode").append(html);

            var battcode = battery.bcode;



            $("#batteryCode").click(function () {


                if ($("#batteryCode :selected").val()==battcode ){
                    $("#batteryType").val(battery.btype);
                    $("#batteryCat").val(battery.bcategory);

                }

            });

        });
    });
}


$("#btnplaceorder").click(function () {

    var ajaxConfig = {
        method: "POST",
        url:"api/Order.php?action=save",
        data: $("#customerform").serialize() + "&action=save",
        async: true
    };

    $.ajax(ajaxConfig).done(function (response) {
        if (response) {
            alert("Successfuly added");
            $("#oid").val("");
            $("#odate").val("");
            $("#customerName").val("");
            $("#cusID").val("");
            $("#ccontact").val("");
            $("#batteryCode").val("");
            $("#batteryType").val("");
            $("#batteryCat").val("");
            $("#batteryPrice").val("");

        } else {
            alert("Failed to add ");
            $("#oid").val("");
            $("#odate").val("");
            $("#customerName").val("");
            $("#cusID").val("");
            $("#ccontact").val("");
            $("#batteryCode").val("");
            $("#batteryType").val("");
            $("#batteryCat").val("");
            $("#batteryPrice").val("");

        }
    })

});



$(document).on("click", "#tblOrder tbody tr td:nth-child(5)", function () {
    total=total-parseInt($(this).parents("tr").find("td:nth-child(4)").text());
    parseInt(total);
    $("#textTotal").val(total);
    $(this).parents("tr").remove();



});
