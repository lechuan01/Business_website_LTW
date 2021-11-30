<div class="member-container">
    <h2 style="text-align: center;">Tất cả thành viên</h2>
    <div class="container">
        <table class="table table-hover align-middle" id="admin-member-table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">ID</th>
                    <th scope="col">Tên thành viên</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 0;
                foreach ($data["members"] as $mem) {
                    $index += 1; ?>
                    <tr>
                        <td><?php echo $index ?></td>
                        <?php if ($mem["accept"] == 'F') { ?>
                        <td>
                            <span class="badge bg-danger"><?php echo $mem["id"]; ?></span>
                        </td>
                        <?php } else { ?>
                        <td>
                        <span class="badge bg-success"><?php echo $mem["id"]; ?></span>
                        </td>
                        <?php } ?>
                        <td><?php echo $mem["full_name"]; ?></td>
                        <td><?php echo $mem["phone_number"]; ?></td>
                        <td><?php echo $mem["email"]; ?></td>
                        <td><?php echo $mem["address"]; ?></td>
                        <?php if ($mem['accept'] == 'T') { ?>
                            <td>
                                <button type="button" class="btn btn-danger restrict-member-btn" data-id="<?php echo $mem["id"]; ?>">Cấm thành viên này</button>
                            </td>
                        <?php } else {?>
                            <td>
                                <button type="button" class="btn btn-success unrestrict-member-btn" data-id="<?php echo $mem["id"]; ?>">Cho phép hoạt động</button>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.restrict-member-btn').click(function() {
            if (confirm("Bạn có chắc chắn hạn chế thành viên này?")) {

                const id = $(this).data('id');
            
                $.ajax({
                    type: 'post',
                    url: '/admin/memberRestrict',
                    data: { id: id },
                    success: function(res) {
                        if (res == 200) {
                            alert("Bạn đã hạn chế thành viên này hoạt động");
                        }
                        else {
                            alert(res);
                        }
                        window.location.reload();
                    }
                });
            }
        });
        $('.unrestrict-member-btn').click(function() {
            if (confirm("Bạn có chắc chắn cho phép thành viên này hoạt động?")) {

                const id = $(this).data('id');
            
                $.ajax({
                    type: 'post',
                    url: '/admin/memberUnrestrict',
                    data: { id: id },
                    success: function(res) {
                        if (res == 200) {
                            alert("Bạn đã hạn chế thành viên này hoạt động");
                        }
                        else {
                            alert(res);
                        }
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>