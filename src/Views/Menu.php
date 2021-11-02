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
        ?><div class="cls"> <p><?php echo $val['Id'];?></p><?php
            ?> <p><?php echo $val['Name'];?></p><?php
            ?> <p><?php echo $val['Price'];?></p><?php
            ?> <p><?php echo $val['Descrip'];?></p><?php
            ?> <p><?php echo $val['Type'];?></p><?php
            ?> <img class="imgs" src="./public/img/<?php echo $val['Picture'] ?>">
            <br>
        </div><?php
        }
    ?>
    </div>
</body>
</html>
