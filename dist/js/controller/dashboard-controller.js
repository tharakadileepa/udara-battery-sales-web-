$(document).ready(function(){

    var ajaxConfig = {
        method:"GET",
        url:"api/customer.php",
        data:{
            action:"count"
        },
        async:true
    }

    $.ajax(ajaxConfig).done(function(response){
        $("#lblCustomersCount").text(response);
    });

    var ajaxConfigsm = {
        method:"GET",
        url:"api/Item.php",
        data:{
            action:"count"
        },
        async:true
    }

    $.ajax(ajaxConfigsm).done(function(response){
        $("#lblitemCount").text(response);
    });


    var ajaxConfigsm = {
        method:"GET",
        url:"api/Order.php",
        data:{
            action:"count"
        },
        async:true
    }

    $.ajax(ajaxConfigsm).done(function(response){
        $("#lblOrderCount").text(response);
    });




});
