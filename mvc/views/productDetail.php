
<div>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/product">Product</a></li>
        <li class="breadcrumb-item active" aria-current="page"><?= $data['detail'][0]['name']?></li>
    </ol>
</div>
<div class="card">
    <!-- card left -->
    <div class="product-imgs">
        <div class="img-display">
            <div class="img-showcase">
                <?php foreach($data['detail'] as $key=> $value) { if($key==0) continue;?>
                <img src="/public/images/<?=$value['image']?>" alt="shoe image">
                <?php } ?>
            </div>
        </div>
        <div class="img-select">
            <?php foreach($data['detail'] as $key=> $value) { if($key==0) continue;?>
            <div class="img-item">
                <a data-id="<?= $key?>">
                    <img src="/public/images/<?=$value['image']?>" alt="shoe image">
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- card right -->
    <div class="product-content">
        <h2 class="product-title"><?= $data['detail'][0]['name']?></h2>
        <!-- <a href="#" class="product-link">visit nike store</a> -->
        <div class="product-rating">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star-half-alt"></i>
            <span>4.7(21)</span>
        </div>

        <div class="product-price">
            <!-- <p class="last-price">Old Price: <span>$257.00</span></p> -->
            <p class="new-price">Giá: <span><?= $data['detail'][0]['price']?> Đ</span></p>
        </div>

        <div class="product-detail">
            <ul>
                <!-- <li><i class="fas fa-check-circle"></i> Màu: <span>Đen</span></li> -->
                <li><i class="fas fa-check-circle"></i> Tình trạng: <span><?php if($data['detail'][0]['quantity']>0) echo "Còn hàng"; else echo "Hết Hàng!"?></span></li>
                <li><i class="fas fa-check-circle"></i> Loại: <span><?= $data['detail'][0]['category']?></span></li>
                <!-- <li><i class="fas fa-check-circle"></i> Switch: <span>Cherry Silver</span></li> -->
                <!-- <li><i class="fas fa-check-circle"></i> Keycaps: <span>PBT Double Shot</span></li> -->
            </ul>
        </div>

        <div class="" id="<?= $data['detail'][0]['id']?>">
            <button id="submitbtn" class="btn btn-danger purchase-info" >Thêm vào giỏ hàng <i class="fas fa-shopping-cart"></i></button>
        </div>
    </div>
</div>
<div class="card product-review">
    <h2>Mô tả sản phẩm</h2>
</div>
<div class="card product-review">
    <h2>Nhận xét</h2>    
</div>
