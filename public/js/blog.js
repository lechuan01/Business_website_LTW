$(document).ready(function () {
    
    $('#img-aq').click(function () {
        location.href = "/product";
    });
    $('.post-thumb').click(function () {
        location.href = "./blog/detail?title=" + e.target.parentNode.parentNode.title   ;
    });
    

});