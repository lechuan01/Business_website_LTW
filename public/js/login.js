$(document).ready(function () {
    $('#login-button').click(function () {
        var datas = $('form#form_input_login').serialize();
        $.ajax({
            type: 'POST',
            url: 'login/login',
            data: datas,
            datatype: 'json',
            success: function (data) {
                const res = data.split('/');
               
                if (res[0] == 'false') {
                    $('#content_login').html("<p class='x51' style='display:inline'>Số điện thoại hoặc mật khẩu không đúng</p>"); 
                } 
                else {
                    if (res[0] == 'true' && res[1] == 'ADM') {
                        location.href = "/admin";
                    }

                    else if (res[0] == 'true' && res[1] == 'MEM') {
                        location.href = "/home";
                    }
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