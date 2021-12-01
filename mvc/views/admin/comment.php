<div class="member-container">
    <h2 style="text-align: center;">Danh sách đánh giá</h2>
    <div class="container">
        <table class="table table-hover align-middle" id="admin-member-table">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Sđt người đánh giá</th>
                    <th scope="col">Điểm đánh giá</th>
                    <th scope="col">Đánh giá</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php $index = 0;
                foreach ($data["listComments"] as $comment) {
                    $index += 1; ?>
                    <tr>
                        <td><?php echo $index ?></td>
                        <td><?php echo $comment["p_name"]; ?></td>
                        <td><?php echo $comment["phone"]; ?></td>
                        <td><?php echo $comment["mark"]; ?></td>
                        <td><?php echo $comment["comments"]; ?></td>
                        <td class="d-flex">
                            <button type="button" class="btn btn-danger delete-comment" onclick="confirm('Bạn chắc chắn xóa bình luận này?')" data-id="<?php echo $comment["product_id"]; ?>"data-m_id="<?php echo $comment["m_id"]; ?> ">Xóa</button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <button type="button" class="btn btn-primary detail-comment" data-bs-toggle="modal" data-bs-target="#exampleModal-detail">
            Thống kê
        </button>
        <div class="modal fade" id="exampleModal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thống kê đánh giá</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="order-detail">          
                        <div class="order-detail-body">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Số đánh giá</th>
                                    <th scope="col">Điểm trung bình</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" style="margin-left:  1000px;">Đóng</button>
                </div>
            </div>
        </div>
        <br><br> 
    </div>
</div>
<script src="/public/js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.delete-comment').click(function() {
            const id = $(this).data('id'); // product id
            const m_id = $(this).data('m_id'); // member id
              $.ajax({
                type: 'post',
                url: "/admin/commentDelete",
                data: {
                    id: id,
                    m_id: m_id
                },
                success: function(res) {
                    if (res) {
                        window.location.href = "/admin/comment";
                    }
                }
            });   
        });
        $('.detail-comment').click(function() {
            $.ajax({
                type: 'post',
                url: `/admin/listComment`,
                dataType: 'json',
                success: function(res) {
                    if (res == 404) {
                        console.log("Not found product");
                    } else {
                         let tr = '';
                        for (let i = 0; i < res.length  ; ++i) {
                            tr += `<tr>
                            <td>${res[i].id}</td>
                            <td>${res[i].name} </td>
                            <td>${res[i].n_comment} </td>
                            <td>${res[i].marks} </td>
                            </tr>`;
                        }
                        $('#order-detail .order-detail-body tbody').html(tr); 
                    }
                }
            });
        });
    });
</script>