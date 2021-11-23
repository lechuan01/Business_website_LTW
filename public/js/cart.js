$(document).ready(function() {
    TotalPrice();
    $('.change-qty-btn').click(function(e){
        update(e.target.parentNode.id,e.target.innerHTML);
    })
    function update(id,option){
        // var x = $("#namess").val();
        // var y = $('#sdt').val();
        // $("#"+dishname).val(Number($("#"+dishname).val())+1);
        if(option=='-'){
            if($("#"+id).children('input').val() == "1") return;
            $.ajax({
                url:"/cart/ReduceQuantity",
                method: "GET",
                data:{
                "id": id
                },
                success:function(data){
                    result=JSON.parse(data);
                    $("#"+id).children('input').val(result[0]);
                    $("#"+id+"Price").text(result[1]*result[0]);
                    TotalPrice();
                }
            });
        }
        else{
            $.ajax({
                url:"/cart/IncreaseQuantity",
                method: "GET",
                data:{
                "id": id
                },
                success:function(data){
                    result=JSON.parse(data);
                    $("#"+id).children('input').val(result[0]);
                    $("#"+id+"Price").text(result[1]*result[0]);
                    TotalPrice();
                }
            });
        }
        
    }
    function TotalPrice(){
        var n =$(".total-price").length, x=0;

        for(var i = 0;i< n; i++){
            x += parseInt($(".total-price").eq(i).text());
        }
        x = Math.round((x*1.1) * 100)/100;

        $('.total-number').text(x);
        // $.ajax({
        //   url:"/cart/TotalPrice",
        //   method: "GET",
        //   success:function(data){
        //     $('.total-number').text(data);
        //   }
        // });
    }
    
    $('.remove').click(function(e){
        deletedish(e.target.name);
    })
    function deletedish(id){
        $.ajax({
            url:"/cart/RemoveItem",
            method: "GET",
            data:{
            "id": id
            }
        });
        if($("#quantity-product").html() == "1"){location.reload(); return;} 
        $(".payment-info:first").children("p:last").html(Number($("#quantity-product").html())-1);
        $("#quantity-product").html(Number($("#quantity-product").html())-1);
        $(".cart-item-info[name="+id+"]").remove();
        TotalPrice();
    }
})