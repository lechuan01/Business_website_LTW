<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Gaming</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">

    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="/public/fontawesome/css/all.min.css">

    <!-- ANIMATION -->
    <link rel="stylesheet" href="/public/vendor/animate/animate.css">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="/public/css/app.css">
</head>

<body>
    <div class="back-to-top"></div>
    <!-- <?php require "./mvc/views/partials/header.php"; ?> -->
    <div class="main-container">
        <?php require "./mvc/views/".$view.".php"; ?>
    </div>

    <!-- <?php require "./mvc/views/partials/footer.php"; ?> -->


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="/phpapp/btl_ltw/public/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/phpapp/btl_ltw/public/js/google-maps.js"></script>
    <script src="/phpapp/btl_ltw/public/vendor/wow/wow.min.js"></script>
    <script src="/phpapp/btl_ltw/public/js/products.js"></script>
    <script src="/phpapp/btl_ltw/public/js/theme.js"></script>
</body>
</html>