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
                    if (res[1] == 'null') {
                        $('#content_login').html("<p class='x51' style='display:inline'>Số điện thoại hoặc mật khẩu không đúng</p>"); 
                    }
                    else {
                        $('#content_login').html("<p class='x51' style='display:inline'>Tài khoản của bạn không được phép đăng nhập vì vi phạm quy định của website. Vui lòng liên hệ quản trị viên: admin_corgear@gmail.com</p>"); 
                    }
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