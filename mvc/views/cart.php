<div class="cart-container">
    <div class='cart-and-summary'>
        <div class="cart-item-container">
            <div class="cart-item-info">
                <div class="product-info">
                    <img src='./public/images/JBL_JR 310BT_Product Image_Detail_Skyblue.png' alt='Image' />
                    <div class='cart-des-item'>
                        <p>Tên sản phẩm</p>
                        <p>12.000đ</p>
                    </div>
                </div>


                <div class='cart-quantity'>
                    <button class="change-qty-btn"><i class="fas fa-minus"></i></button>
                    <input type="text" readonly value="1" class="quantity-area">
                    <button class="change-qty-btn"><i class="fas fa-plus"></i></button>
                </div>

                <div class='total-price'>
                    <p>124.000đ</p>
                </div>

                <div class='remove'>
                    <a class="btn btn-danger" href="cart/delete/{{this.id}}" onclick="return confirm('Are you sure to delete this item?')"><i class='fas fa-trash-alt'></i></a>
                </div>
            </div>
        </div>

        <div class="summary">
            <h2 class="receipt">Thanh toán</h2>
            <div class="payment-info">
                <p>Số sản phẩm</p>
                <p>13</p>
            </div>
            <div class="payment-info">
                <p>Thuế VAT</p>
                <p>10%</p>
            </div>
            <div class="total-payment">
                <p class="total-title">Thành tiền</p>
                <p class="total-number">450.000đ</p>
            </div>
            <div class="process-to-checkout">
                <a class="checkout-button" href="/checkout">Thanh toán</a>
            </div>
        </div>
    </div>
</div>