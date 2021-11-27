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
})


