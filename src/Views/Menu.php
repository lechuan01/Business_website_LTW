<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link type="text/css" rel="stylesheet" href="./public/css/style.css">
</head>
<body>
    <div>
    
    <?php 
        foreach($data["menu"] as $x => $val) {
        ?><div class="cls"> <p><?= $val['Id'];?></p>
            <p><?= $val['Name'];?></p>
            <p><?= $val['Price'];?></p>
            <p><?= $val['Descrip'];?></p>
            <p><?= $val['Type'];?></p>
            <img class="imgs" src="./public/img/<?= $val['Picture'] ?>">
            <br>
        </div><?php
        }
    ?>
    </div>
</body>
</html>
