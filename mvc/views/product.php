<div class="products">
    <h1 class="lg-title">Tất cả sản phẩm</h1>
    <div class="product-category">
        <div class="keyboard">
            <img src="/public/upload/corsair-k65-rgb-mini.jpeg" alt="">
            <p>Keyboard</p>
        </div>
        <div class="mouse">
            <img src="/public/upload/Corsair-M65-RGB-Elite.jpg" alt="">
            <p>Mouse</p>
        </div>
        <div class="headphone">
            <img src="/public/upload/corsair-headphone.jpg" alt="">
            <p>Headphone</p>
        </div>
        <div class="case">
            <img src="/public/upload/corsair-case.jpg" alt="">
            <p>Case</p>
        </div>
    </div>
    <div class="product-filter">
        <select name="" id="SORT">
            <option value="newold">Mới nhất</option>
            <option value="priceincrease">Giá thấp đến cao</option>
            <option value="pricereduce">Giá cao đến thấp</option>
        </select>
    </div>
    <div class="product-items">
        <?php foreach ($data["product"] as $key => $product) {
        ?>
        <!-- single product -->
        <div id="<?= $product["id"]?>" name="<?= $product["category"]?>" class="product wow fadeInDown">
                <div class="product-img">
                    <img src="./public/upload/<?= $product["thumnail"]?>" alt="product image">
                </div>

            <div class="product-btns">
                <button class="btn-cart"> add to cart
                    <span><i class="fas fa-plus"></i></span>
                </button>
                <button type="button" class="btn-buy"> buy now
                    <span><i class="fas fa-shopping-cart"></i></span>
                </button>
            </div>

            <div class="product-info" name="<?= $product["price"]?>">
                <div class="product-info-top rating">
                    <h2 class="sm-title"><?= $product["category"]?></h2>
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                </div>
                <a href="#" class="product-name"><?= $product["name"]?></a>
                <p class="product-price">$ <?= $product["price"]*1.1?></p>
                <p class="product-price">$ <?= $product["price"]?></p>
            </div>

            <!-- <div class="off-info">
                <h2 class="sm-title">25% off</h2>
            </div> -->
        </div>
        <?php }?>
        <!-- end of single product -->
        <!-- <div class="product wow fadeInDown" data-wow-delay="0.1s">
            <div class="product-content">
                <div class="product-img">
                    <img src="/public/upload/ban-phim-co-corsair-k65-mini.jpg" alt="product image">
                </div>
                <div class="product-btns">
                    <button type="button" class="btn-cart"> add to cart
                        <span><i class="fas fa-plus"></i></span>
                    </button>
                    <button type="button" class="btn-buy"> buy now
                        <span><i class="fas fa-shopping-cart"></i></span>
                    </button>
                </div>
            </div>

            <div class="product-info">
                <div class="product-info-top">
                    <h2 class="sm-title">Bàn phím</h2>
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                </div>
                <a href="#" class="product-name">Corsair K65 MINI</a>
                <p class="product-price">$ 150.00</p>
                <p class="product-price">$ 133.00</p>
            </div>
        </div>
        <!-- end of single product -->
        <!-- single product -->
        <div class="product wow fadeInDown" data-wow-delay="0.2s">
            <div class="product-content">
                <div class="product-img">
                    <img src="/public/upload/products/1.jpg" alt="product image">
                </div>
                <div class="product-btns">
                    <button type="button" class="btn-cart"> add to cart
                        <span><i class="fas fa-plus"></i></span>
                    </button>
                    <button type="button" class="btn-buy"> buy now
                        <span><i class="fas fa-shopping-cart"></i></span>
                    </button>
                </div>
            </div>

            <div class="product-info">
                <div class="product-info-top">
                    <h2 class="sm-title">Chuột</h2>
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                </div>
                <a href="#" class="product-name">Corsair GLAIVE RGB PRO</a>
                <p class="product-price">$ 150.00</p>
                <p class="product-price">$ 133.00</p>
            </div>
        </div>
        <!-- end of single product -->
        <!-- single product -->
        <div class="product wow fadeInDown" data-wow-delay="0.3s">
            <div class="product-content">
                <div class="product-img">
                    <img src="/public/upload/products/2.jpg" alt="product image">
                </div>
                <div class="product-btns">
                    <button type="button" class="btn-cart"> add to cart
                        <span><i class="fas fa-plus"></i></span>
                    </button>
                    <button type="button" class="btn-buy"> buy now
                        <span><i class="fas fa-shopping-cart"></i></span>
                    </button>
                </div>
            </div>

            <div class="product-info">
                <div class="product-info-top">
                    <h2 class="sm-title">Headphone</h2>
                    <div class="rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                </div>
                <a href="#" class="product-name">HS80 RGB Wireless</a>
                <p class="product-price">$ 150.00</p>
                <p class="product-price">$ 133.00</p>
            </div>

            <div class="off-info">
                <h2 class="sm-title">25% off</h2>
            </div>
        </div>
        <!-- end of single product -->
    </div>
</div>

<!-- <div class="product-collection">
    <div class="container">
        <div class="product-collection-wrapper">
           
            <div class="product-col-left flex">
                <div class="product-col-content">
                    <h2 class="sm-title">men's shoes </h2>
                    <h2 class="md-title">men's collection </h2>
                    <p class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                    <button type="button" class="btn-dark">Shop now</button>
                </div>
            </div>

            
            <div class="product-col-right">
                <div class="product-col-r-top flex">
                    <div class="product-col-content">
                        <h2 class="sm-title">women's dresses </h2>
                        <h2 class="md-title">women's collection </h2>
                        <p class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                        <button type="button" class="btn-dark">Shop now</button>
                    </div>
                </div>

                <div class="product-col-r-bottom">
                   
                    <div class="flex">
                        <div class="product-col-content">
                            <h2 class="sm-title">summer sale </h2>
                            <h2 class="md-title">Extra 50% Off </h2>
                            <p class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                            <button type="button" class="btn-dark">Shop now</button>
                        </div>
                    </div>
                    
                    <div class="flex">
                        <div class="product-col-content">
                            <h2 class="sm-title">shoes </h2>
                            <h2 class="md-title">best sellers </h2>
                            <p class="text-light">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae consequatur facilis eligendi quibusdam voluptatibus exercitationem autem voluptatum, beatae architecto odit, quisquam repellat. Deleniti, architecto ab.</p>
                            <button type="button" class="btn-dark">Shop now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->