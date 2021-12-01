    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/admin">Friend Shop Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/admin/member">Quản lý thành viên</a>
                    </li>
    
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/orders">Quản lý đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/comment">Quản lý bình luận</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/product">Quản lý sản phẩm</a>
                    </li>
                </ul>
                <?php if (!empty($_SESSION["idadmin"])) { ?>
                    <div class="dropdown">
                        <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, ADMIN
                        </button>
                        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="dropdownMenu2">
                            <li><a class="dropdown-item" href="/admin">Quản lý</a></li>
                            <li><a class="dropdown-item" href="/admin/loggout" style="color: red;">Đăng xuất</a></li>
                        </ul>
                    </div>
                <?php } ?>

            </div>
        </div>
    </nav>