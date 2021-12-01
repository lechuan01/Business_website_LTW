<div class="product-container">
    <h2 style="text-align: center;">Danh sách đơn hàng</h2>
    <div class="container">
        <!-- Button trigger modal -->
        <table class="table table-hover align-middle" id="admin-member-table">
            <thead>
                <tr>
                    <th scope="col">Mã đơn hàng</th>
                    <th scope="col">Sđt người đặt hàng</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hình thức thanh toán</th>
                    <th scope="col">Giá trị đơn hàng</th>
                    <th scope="col">Ngày tạo đơn hàng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $index = 0;
                foreach ($data["listOrders"] as $order) {
                    $index += 1; ?>
                    <tr>
                        <td><?php echo $order["id"] ?></td>
                        <td><?php echo $order["phone"]; ?></td>
                        <td><?php echo $order["stt"]; ?></td>
                        <td><?php echo $order["pay"]; ?></td>
                        <td><?php echo number_format($order["cost"], 0, "", ","); ?></td>
                        <td><?php echo $order["create_date"]; ?></td>
                        <td class="d-flex">
                            <button type="button" class="btn btn-warning detail-order" data-bs-toggle="modal" data-bs-target="#exampleModal-detail" data-id="<?php echo $order["id"]; ?>">Xem chi tiết</button>
                            <button type="button" style= "margin-left : 15px" class="btn btn-danger complete-order" onclick="confirm('Bạn chắc chắn xác nhận hoàn tất đơn này?')" data-id="<?php echo $order["id"]; ?>">Hoàn tất</button>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
        <!-- Modal for detail orders -->
        <div class="modal fade" id="exampleModal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Chi tiết đơn hàng</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" id="order-detail">
                        <div class="order-detail-title">
                            <p></p>
                            <p></p>
                            <p></p>
                        </div>
                        <hr>            
                        <div class="order-detail-body">
                            <h5>Danh sách sản phẩm đã mua</h5>
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Số lượng</th>
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
    </div>
</div>
</div>

<script src="/public/js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.complete-order').click(function() {
            const id = $(this).data('id'); // order id
            $.ajax({
                type: 'post',
                url: `/admin/completeOrder`,
                data: {
                    id: id
                },
                success: function(res) {
                    if (res) {
                        window.location.href = "/admin/orders";
                    }
                }
            });
        });
        $('.detail-order').click(function() {
            const id = $(this).data('id');
            // console.log(id);
            $.ajax({
                type: 'post',
                url: `/admin/Ordersdetail?id=${id}`,
                dataType: 'json',
                success: function(res) {
                    if (res == 404) {
                        console.log("Not found product");
                    } else {
                        $('#order-detail .order-detail-title p:first-child').html(`Tên người mua: <strong>${res[0].full_name}</strong>`);
                        $('#order-detail .order-detail-title p:nth-child(2)').html(`Email: <strong>${res[0].email}</strong>`);
                        $('#order-detail .order-detail-title p:nth-child(3)').html(`Địa chỉ: <strong>${res[0].address}</strong>`);
                        let tr = '';
                        for (let i = 1; i < res.length  ; ++i) {
                            tr += `<tr>
                            <td>${i} </td>
                            <td>${res[i].name} </td>
                            <td>${res[i].price} </td>
                            <td>${res[i].quantity} </td>
                            </tr>`;
                        }

                        $('#order-detail .order-detail-body tbody').html(tr);
                    }
                }
            });
        });
    });
</script>