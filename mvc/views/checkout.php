
<section class="menu ">
    <div class="paymentss">
    <h1>Thanh toán đơn hàng</h1>
        <form>
            <table>
                <tr>
                    <th>Tên Sản phẩm</th>
                    <th>Giá (đ)</th>
                    <th>Số lượng</th>
                </tr>
                <?php $_SESSION['pay']=0; foreach ($_SESSION['Cart'] as $key => $value) { $_SESSION['pay']+=$value['price']*$value['choose']; ?>
                <tr>
                    <td><?= $value['name']?></td>
                    <td><?= number_format($value['price'], 0, "", ",")?></td>
                    <td><?= $value['choose']?></td>
                </tr>
                <?php } $_SESSION['pay']=$_SESSION['pay']*1.1; ?>
                <tr>
                    <th>Thuế:</th>
                    <td>10%</td>
                    <td></td>
                </tr>
                <tr>
                    <th>Tổng giá:</th>
                    <td id="total-price"><?= number_format($_SESSION['pay'], 0, "", ",")?></td>
                    <td></td>
                </tr>
            </table>
        </form>
    <table style="margin:0 auto;" >
        <thead>
            <tr>
                <th colspan="3" style="text-align: center;">Phương thức thanh toán</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="d-flex">
                    <button style="width: 50%;" type="button" class="btn btn-secondary" onclick="window.location.href='#popup4'">
                        CASH   <span class="glyphicon glyphicon-chevron-right"></span></button>
                    <button style="width: 50%;" type="button" class="btn btn-success" onclick="window.location.href='#popup5'">
                        ONLINE   <span class="glyphicon glyphicon-chevron-right"></span></button>
                </td>
            </tr>
        </tbody>
    </table>
    </div>
</section>

    <div id="popup4" class="overlay">
        <div class="login-box">
            <h2> Payment Success </h2>
            <form>
                <div class="user-box">
                    <label class="thanh">Thank you for using our service! See you soon.</label>
                </div>
                <div class="btn btn-success btn-lg btn-block text-center" style="width: 100%;">  
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <a href="/checkout/create?type=cash">DONE</a>
                </div>
            </form>
        </div>
    </div>

    <div id="popup5" class="overlay">
        <div class="login-box">
            <h2> Payment Success </h2>
            <form>
                <div class="user-box">
                    <label id="main" style="width: 320px; height: 400px;">
                            <img src="public/img/momo.jpg" style="width: 100%; aspect-ratio: 1/1;"/>
                    </label><br>
                    <label>Thank you for using our service! See you soon.</label>   
                </div>
                <div class="btn btn-success btn-lg btn-block" style="width: 100%;">  
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <a href="/checkout/create?type=online">DONE</a>
                </div>
            </form>
        </div>
    </div>

<script>
    
</script>