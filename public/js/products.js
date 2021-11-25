$(document).ready(function () {
    $('.btn-cart').click(function (e) {
        //console.log(e.target.name);
        console.log(e.target.parentNode.parentNode.id);
        $.ajax({
            url: "/product/Store",
            method: "GET",
            data: {
                "id": e.target.parentNode.parentNode.id
            },
            success: function (data) {
                $('#quantity-product').text(data);
            }
        });
    });
    // $(".btn-buy").click(function (e) {
    //     //console.log(e.target.name);
    //     $.ajax({
    //         url: "/product/Store",
    //         method: "GET",
    //         data: {
    //             "id": e.target.parentNode.parentNode.id
    //         },
    //         success: function (data) {
    //             $('#quantity-product').text(data);
    //         }
    //     });
    //     location.href = "/cart";
    // })
    $('.product-img, .product-name').click(function (e) {
        location.href = "./product/productDetail?id=" + e.target.parentNode.parentNode.id;
    });
    $('.keyboard').click(() => filterProduct('keyboard'));
    $('.mouse').click(() => filterProduct('mouse'));
    $('.headphone').click(() => filterProduct('headphone'));
    $('.case').click(() => filterProduct('case'));
    $('.lg-title').click(() => {
        $('.product-items').children().css('display', 'block');
    });

    function filterProduct(value) {
        $('.product-items').children('div[name!=' + value + ']').css('display', 'none');
        $('.product-items').children('div[name=' + value + ']').css('display', 'block');
    }

    $('#SORT').change(() => {
        if ($('#SORT').val() == 'priceincrease') {
            SortPrice(asc_price);
        }
        else if ($('#SORT').val() == 'pricereduce') {
            SortPrice(desc_price);
        }
        else {
            $(".product-items > div").sort(newold).appendTo('.product-items');
        }
    });
    function SortPrice(func) {
        $(".product-items > div").sort(func).appendTo('.product-items');
    }
    function newold(a, b) {
        return ($(a).attr('id') > $(b).attr('id')) ? -1 : 1;
    }
    // Sắp xếp giá tăng dần
    function asc_price(a, b) {
        a = $(a).children('div:last-child').attr('name');
        b = $(b).children('div:last-child').attr('name');
        return (a > b) ? 1 : -1;
    }
    // Sắp xếp gia giảm dần
    function desc_price(a, b) {
        a = $(a).children('div:last-child').attr('name');
        b = $(b).children('div:last-child').attr('name');
        return (a > b) ? -1 : 1;
    }

});