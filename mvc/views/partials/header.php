<header>
    <nav class="sticky" data-offset="500">

        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>

        <label class="logo"><a href="/home">CorGear</a></label>
        <ul>
            <li><a class="active" href="./home">Trang chủ</a></li>
            <li><a href="/product">Sản phẩm</a></li>
            <li><a href="/blog">Tin tức</a></li>
            <li><a href="#">Liên hệ</a></li>
            <li><a href="/cart"><i class="fas fa-shopping-cart"></i>
                    <span id="quantity-product"><?= empty($_SESSION["Cart"]) ? 0 : count($_SESSION["Cart"]) ?></span>
                </a></li>
            <li>
                <?php if (empty($_SESSION["id"])) { ?>
                    <a href="/login">Đăng nhập</a>
                <?php } else { ?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?php if (isset($_SESSION['name'])) echo $_SESSION['name']; ?>
                        </button>
                        <ul class="dropdown-menu" style="height: max-content;" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="/profile">Tài khoản của tôi</a></li>
                            <li><a class="dropdown-item" href="#" id="logout" name="logout" style="color: red;">Đăng Xuất</a></li>
                        </ul>
                    </div>
                <?php } ?>
            </li>
        </ul>
    </nav>
</header>