$(document).ready(function () {
    $('#login-button').click(function () {
        var datas = $('form#form_input_login').serialize();
        $.ajax({
            type: 'POST',
            url: 'login/login',
            data: datas,
            success: function (data) {
                if (data == 'false') {
                    $('#content_login').html("<p class='x51' style='display:inline'>Số điện thoại hoặc mật khẩu không đúng</p>"); 
                } 
                else {
                    location.href = "/home";
                }
            }
        });
    })
    $('#logout').click(function () {
        $.ajax({
            type: 'GET',
            url: 'login/logout',
            success: function (data) {
                if (data == 'true') {
                    location.href = "/home";
                } 
                else {
                    $('#content_login').html("<p class='x51' style='display:inline'>không đúng</p>"); 
                }
            }
        });
    })
});