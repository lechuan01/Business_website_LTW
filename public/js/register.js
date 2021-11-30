$(document).ready(function () {
    $('#register-button').click(function () {
        var datas = $('form#form_input_register').serialize();
        $.ajax({
            type: 'POST',
            url: 'register/registerUser',
            data: datas,
            success: function (data) {                
                if (data == 'false') {
                    //console.log($('#content-register').text());
                    $('#content-register').html("<p class='x51' style='display:inline'>Đăng ký không thành công</p>");
                } else {
                    location.href = "/login";
                }
            }
        });
    })
    $("input[name=fullName]").change(function(e){
        //var name=new RegExp(/^.*[. ]+$/);
        //var name=new RegExp(/^[0-9!-/:-@[-`{-~]+$/);
        var name=new RegExp(/^[a-zA-ZẮẰẲẴẶĂẤẦẨẪẬÂÁÀÃẢẠĐẾỀỂỄỆÊÉÈẺẼẸÍÌỈĨỊỐỒỔỖỘÔỚỜỞỠỢƠÓÒÕỎỌỨỪỬỮỰƯÚÙỦŨỤÝỲỶỸỴăắằặẵẳáàảãạâấầẩẫậđêếềệểễéèẹẽẻịíìĩỉôồốổộỗơờớởỡợòóỏõọứừưựữửụũủùúỳýỹỵỷ ?]+$/);
        if(name.test(e.target.value)) $("#errorname").html("<p class='x51' style='display:none'>Tên hợp lệ</p>");
        else $("#errorname").html("<p class='x51' style='display:inline'>Chỉ sử dụng các chữ cái và khoảng cách trắng</p>");
    })
    $("input[name=phoneNumber]").change(function(e){
        //var name=new RegExp(/^.*[. ]+$/);
        var num=new RegExp(/^[0-9]+$/);
        if(num.test(e.target.value) && e.target.value.length>=10) $("#errorphone").html("<p class='x51' style='display:none'>Số điện thoại hợp lệ</p>");
        else $("#errorphone").html("<p class='x51' style='display:inline'>Đây không phải là một số điện thoại hợp lệ</p>");
    })
    $("input[name=email]").change(function(e){
        var mail=new RegExp(/^.*@.*\..+$/);
        if(!mail.test(e.target.value)) {
            $("#erroremail").html("<p class='x51' style='display:inline'>Đây không phải là một địa chỉ email hợp lệ</p>");
        }
        else $("#erroremail").html("<p style='display:none'>Email hợp lệ</p>");
    })
    $("input[name=address]").change(function(e){
        //var name=new RegExp(/^.*[. ]+$/);
        var address=new RegExp(/^[a-zA-Z0-9-/.,ẮẰẲẴẶĂẤẦẨẪẬÂÁÀÃẢẠĐẾỀỂỄỆÊÉÈẺẼẸÍÌỈĨỊỐỒỔỖỘÔỚỜỞỠỢƠÓÒÕỎỌỨỪỬỮỰƯÚÙỦŨỤÝỲỶỸỴăắằặẵẳáàảãạâấầẩẫậđêếềệểễéèẹẽẻịíìĩỉôồốổộỗơờớởỡợòóỏõọứừưựữửụũủùúỳýỹỵỷ ?]+$/);
        if(address.test(e.target.value)) $("#erroraddress").html("<p class='x51' style='display:none'>Địa chỉ hợp lệ</p>");
        else $("#erroraddress").html("<p class='x51' style='display:inline'>Đây không phải là một địa chỉ hợp lệ</p>");
    })
    $("input[name=password]").change(function(e){
        if(e.target.value.length < 8) $("#errorpass").html("<p class='x51' style='display:inline'>Mật khẩu phải dài ít nhất 8 ký tự</p>");
        else $("#errorpass").html("<p style='display:none'>Mật khẩu hợp lệ</p>");
    })
    $("input[name=confirmPassword]").change(function(e){
        if(e.target.value != document.querySelector('input[name=password]').value) $("#errorconfirm").html("<p class='x51' style='display:inline'>Mật khẩu không phù hợp</p>");
        else $("#errorconfirm").html("<p style='display:none'>Mật khẩu hợp lệ</p>");
    })
});