$(document).ready(loadAllItems);

function loadAllItems(){

    var ajaxConfig = {
        method: "GET",
        url:"api/Item.php?action=all",
        async: true
    };

    $.ajax(ajaxConfig).done(function(response){
        console.log(response);
        response.forEach(function (battery){

            var html = "<tr>" +
                "<td>" +battery.bcode + "</td>" +
                "<td>" +battery.btype + "</td>" +
                "<td>" +battery.bcategory + "</td>" +
                '<td class="recycle"><i class="fa fa-2x fa-trash"></i></td>' +
                "</tr>";


            $("#tblItems tbody").append(html);

            $(".recycle").off();
            $(".recycle").click(function(){

                var itemCode = ($(this).parents("tr").find("td:first-child").text());

                if (confirm("Are you sure that you want to delete?")){

                    $.ajax({
                        method:"DELETE",
                        url:"api/Item.php?id=" + itemCode,
                        async: true
                    }).done(function(response){
                        if (response){
                            $("#tblItems tbody tr").remove();
                            alert("Item has been successfully deleted");
                            loadAllItems();
                        } else{
                            alert("Failed to delete the item");
                        }
                    });

                }

            });
        });
    });

}

$("#btnItem").click(loaditem);

function loaditem() {

    var ajaxConfig = {
        method: "POST",
        url: "api/Item.php?action=save",
        data: $("#itemform").serialize()+"&action=save",
        async: true
    }

    console.log(ajaxConfig);

    $.ajax(ajaxConfig).done(function(response){
        if (response){
            $("#tblItems tbody tr").remove();
            loadAllItems();
            alert("Item is successfully saved");
            console.log(response);
        }else{
            alert("Failed to save the item ");

        }
    })

}

var update;


$(document).on("click","#tblItems tbody tr", function () {
    // $("#btnCustomer").text("Update");
    update=true;
    $("#batteryCode").val($(this).find("td:nth-child(1)").text());
    $("#batteryType").val($(this).find("td:nth-child(2)").text());
    $("#batteryCat").val($(this).find("td:nth-child(3)").text());


});