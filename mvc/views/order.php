<div>
    <h1>Đơn hàng của tôi</h1>
    <div class="order-container">
        <table class="table table-hover">
            <tr>
                <th>Mã Đơn</th>
                <th>Ngày Đặt</th>
                <th>Thanh toán</th>
                <th>Giá</th>
                <th>Tình trạng</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        <?php foreach($data['orderlist'] as $key=>$value){?>
            <tr id="<?= $value['id']?>">
                <td><?= $value['id']?></td>
                <td><?= $value['create_date']?></td>
                <td><?= $value['payment_type']?></td>
                <td><?= number_format($value['cost'], 0, "", ",")?> đ</td>
                <td><?= $value['status']?></td>
                <td><button name="orderDetail" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Chi tiết</button></td>
                <?php if($value['status'] == 'Đang xử lý'){ ?>
                <td><button name="Cancelorder" class="btn btn-danger">Hủy</button></td>
                <?php } else {?>
                <td></td>
                <?php  }?>
            </tr>
        <?php }?>
        </table>
    </div>
</div>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chi tiết</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div>
            <table id="table-orderdetail"></table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>
<style>
    img{
        width:90px;
    }
    @media screen and (max-width: 390px) {
        img{
        display: none;
    }
    }
</style>