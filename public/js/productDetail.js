$(document).ready(function() {

    $('#submitbtn').click(function(e){
        $.ajax({
            url:"/product/Store",
            method: "GET",
            data:{
                "id": e.target.parentNode.id
            },
            success:function(data){
                $('#quantity-product').text(data);
            }
        });
     })
     $("#btn-newreivew").click(function(e){
        if($("#newcontent").val().length > 0) {
            $.ajax({
                url:"/product/newreview",
                method: "POST",
                data:{
                    "content": $("#newcontent").val(),
                    "id": $(".purchase-info").attr("id")
                },
                success:function(data){
                    location.reload();
                }
            });
        }
        else {
            $("#newcontent").attr("placeholder", "Vui lòng nhập nhận xét");
        }
    })
})


