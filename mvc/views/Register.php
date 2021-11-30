<div class="login-center register">
    <h2>Tạo tài khoản</h2>
    <form method="POST" id="form_input_register">
        <div>
            <div class="txt_field">
                <input type="text" name="fullName" required>
                <span></span>
                <label>Họ và tên</label>
            </div>
            <div id="errorname"></div>
        </div>
        <div>
            <div class="txt_field">
                <input type="text" name="phoneNumber" required>
                <span></span>
                <label>Số điện thoại</label>
            </div>
            <div id="errorphone"></div>
        </div>
        <div>
            <div class="txt_field">
                <input type="text" name="email" required>
                <label>Email</label>
            </div>
            <div id="erroremail"></div>
        </div>
        <div>
            <div class="txt_field">
                <input type="text" name="address" required>
                <span></span>
                <label>Địa chỉ</label>
            </div>
            <div id="erroraddress"></div>
        </div>
        <div>
            <div class="txt_field">
                <input type="password" name="password" required>
                <span></span>
                <label>Mật khẩu</label>
            </div>
            <div id="errorpass"></div>
        </div>
        <div>
            <div class="txt_field">
                <input type="password" name="confirmPassword" required>
                <span></span>
                <label>Nhập lại mật khẩu</label>
            </div>
            <div id="errorconfirm"></div>
        </div>
        <input type="button" class="log-in-button" id="register-button" value="Đăng ký">
        <div id="content-register"></div>
        <div class="signup_link">
            Bạn đã có tài khoản? <a href="/login">Đăng nhập ngay</a>

        </div>
        
    </form>
</div>
<!-- <div class="go-to-home-page">
    <a href="/"><i class="fas fa-arrow-left"></i>Trở về trang chủ</a>
</div> -->