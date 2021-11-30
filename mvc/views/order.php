<div>
    <h1>Đơn hàng của tôi</h1>
    <div>
        <table>
            <tr>
                <th>Mã Đơn</th>
                <th>Ngày Đặt</th>
                <th>Phương thức Thanh toán</th>
                <th>Giá</th>
                <th>Tình trạng đơn</th>
            </tr>
        <?php foreach($data['orderlist'] as $key=>$value){?>
            <tr id="<?= $value['id']?>">
                <td><?= $value['id']?></td>
                <td><?= $value['create_date']?></td>
                <td><?= $value['payment_type']?></td>
                <td><?= $value['cost']?></td>
                <td><?= $value['status']?></td>
                <td><button name="orderDetail" class="btn btn-primary">Chi tiết</button></td>
                <td><button name="Cancelorder" class="btn btn-danger">Hủy</button></td>
            </tr>
        <?php }?>
        </table>
    </div>
</div>
<style>
    img{
        width:50px;
    }
</style>
<div>
    <table id="table-orderdetail"> </table>
</div>