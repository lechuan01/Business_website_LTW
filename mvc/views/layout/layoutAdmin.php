<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-control" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Corgear Dashboard</title>
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">

    <!-- DATA TABLE BOOTSTRAP -->
    <link rel="stylesheet" href="/public/css/dataTables.bootstrap5.min.css">

    <!-- FONTAWESOME -->
    <!-- <link rel="stylesheet" href="/public/fontawesome/css/all.min.css"> -->

    <!-- ANIMATION -->
    <!-- <link rel="stylesheet" href="/public/vendor/animate/animate.css"> -->

    <!-- DATA TABLE -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css"> -->


    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="/public/css/admin/app.css">

</head>

<body>
    <div class="back-to-top"></div>
    <?php require "./mvc/views/admin/header.php"; ?>
    <div class="main-container">
        <?php require "./mvc/views/" . $view . ".php"; ?>
    </div>



    <script src="/public/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!-- <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script> -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <script src="/public/js/jquery-3.6.0.min.js"></script>
    <script src="/public/js/jquery.dataTables.min.js"></script>
    <script src="/public/js/dataTables.bootstrap5.min.js"></script>
    <!-- <script src="/public/js/google-maps.js"></script> -->
    <!-- <script src="/public/vendor/wow/wow.min.js"></script> -->
    <!-- <script src="/public/js/theme.js"></script> -->
    <!-- <script src="/public/js/products.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#admin-product-table').DataTable({
                responsive: true
            });
            $('#admin-member-table').DataTable({
                responsive: true
            })
        });
    </script>
    
</body>

</html>