<div class="profile-container">
    <div class="container">
        <h1 style="text-align: center;">Thông tin cá nhân</h1>
        <form action="" id="update-profile">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Tên đầy đủ</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['profile']['full_name']; ?>" name="full_name">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Số điện thoại</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" readonly value="<?php echo $data['profile']['phone_number']; ?>" name="phone">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Email</span>
                <input type="email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['profile']['email']; ?>" name="email">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Địa chỉ</span>
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" value="<?php echo $data['profile']['address']; ?>" name="address">
            </div>
            <button type="submit" name="submit" class="btn btn-success update-profile-btn" data-id="<?php echo $data['profile']['id']; ?>">Lưu thay đổi</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.update-profile-btn').click(function() {
            const id = $(this).data('id');
            $('#update-profile').submit(function(e) {   
                e.preventDefault();
                // console.log($('#update-profile').serializeArray());
                $.ajax({
                    type: 'post',
                    url: '/profile/update',
                    dataType: 'json',
                    data: { 
                        id: id,
                        data: $('#update-profile').serializeArray()
                    },
                    success: function(res) {
                        if (res == 200) {
                            alert("Đã cập nhật thành công");
                            window.location.reload();
                        }
                        else if (res[0] == 304) {
                            alert(res[1]);
                        }
                    }
                });
                
            })
        });
        
    });
</script>