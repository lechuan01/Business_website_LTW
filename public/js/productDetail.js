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

const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);

