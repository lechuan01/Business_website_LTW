<div class="product-container">
    <div class="container">
        <!-- Button trigger modal -->
        <table class="table table-hover align-middle" id="admin-orders-table">
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
                        <td>
                            <button type="button" class="btn btn-warning detail-order" data-bs-toggle="modal" data-bs-target="#exampleModal-detail" data-id="<?php echo $order["id"]; ?>">Xem chi tiết</button>
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
                    <div class="modal-body" id="modal-body-edit">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/public/js/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.detail-order').click(function() {
            const id = $(this).data('id');
            // console.log(id);
            $.ajax({
                type: 'get',
                url: `/admin/Ordersdetail?id=${id}`,
                dataType: 'json',
                success: function(res) {
                    if (res == 404) {
                        console.log("Not found product");
                    } else {

                        
                    }
                }
            });
        });
    });
</script>