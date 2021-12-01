<div class="cart-container">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/product">Product</a></li>
        <li class="breadcrumb-item active" aria-current="page">Giỏ Hàng</li>
    </ol>
    <div class='cart-and-summary'>
        <?php if(!empty($_SESSION["Cart"])){  ?>
        <div class="cart-item-container">
            <?php foreach($_SESSION["Cart"] as $key => $val) { ?>
            <div class="cart-item-info" name="<?= $key?>">
                <div class="product-info">
                    <img src='./public/upload/products/<?= $val['thumnail']?>' alt='Image' />
                    <div class='cart-des-item'>
                        <a href="/product/productDetail?id=<?= $key?>">
                            <p><?= $val['name']?></p>
                            <?php $pirce_ = number_format($val['price'], 0, "", ","); ?>
                            <p><?= $pirce_?></p>
                        </a>  
                    </div>
                </div>
                <div class='cart-quantity' id="<?= $key?>" name="<?= $val['quantity']?>">
                    <button class="change-qty-btn">-</button>
                    <input type="text" readonly value="<?= $val['choose']?>" class="quantity-area">
                    <button class="change-qty-btn">+</button>
                </div>
                <div class='total-price' id="<?= $key?>Price">
                    <?= $val['price']*$val['choose']?>
                </div>
                <div class='remove'>
                <!-- <i class='fas fa-trash-alt' disabled></i> -->
                    <button class="btn btn-danger" name="<?= $key?>">Xóa</button>
                </div>
            </div>
            <?php } ?>
        </div>
        
        <div class="summary">
            <h2 class="receipt">Thanh toán</h2>
            <div class="payment-info">
                <p>Số sản phẩm</p>
                <p><?= count($_SESSION['Cart'])?></p>

            </div>
            <div class="payment-info">
                <p>Thuế VAT</p>
                <p>10%</p>
            </div>
            <div class="total-payment">
                <p class="total-title">Thành tiền</p>
                <p class="total-number"></p>

            </div>
            <div class="process-to-checkout">
                <?php if(!empty($_SESSION["id"])) { ?>
                <a class="checkout-button" href="/checkout">Thanh toán</a>
                <?php } else{ ?>
                <a class="checkout-button" href="/login">Thanh toán</a>
                <?php } ?>
            </div>
        </div>
        <?php }else {?> 
            <div>
                <h1 style="text-align: center;">Không có sản phẩm nào được chọn</h1>
            </div>
        <?php } ?>
    </div>
</div>