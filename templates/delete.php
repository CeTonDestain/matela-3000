<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets//css//style.css">
    <title>Document</title>
</head>
<body>
<header>
        <div><img src="../assets/img//logo fond transparent.png" alt=""></div>
    </header>
    <nav>
        <ul>
            <li><a href="./">catalogue</a></li>
            <li><a href="./index.php?page=add">Ajouter</a></li>
        </ul>
    </nav>
    <main>
        <div class="container">
                <?php
                foreach ($data as $item) {
                ?>
                <div class="item">
                    <div class="imageItem"><img src="<?= $item["img"] ?>" alt="<?= $item["name"] ?>"></div>
                    <div class="textContainer">
                        <div class="nameItem"><?= $item["name"] ?></div>
                        <div class="sizeItem"><?= $item["size"] ?></div>
                        <?php 
                        if(empty($item["promotion"])){
                            ?>
                                <div class="priceItem"><?= $item["price"]?></div>
                        <?php
                        }else{
                        ?>
                             <div class="priceItem"><span class="wrong"><?= $item["price"]?></span>  <span class="good"><?=  $item["price"]*(1-$item["promotion"]/100)?></span></div>
                        <?php
                        }
                    ?>
                    <div class="littleCross" data-id="<?=$item["id"] ?>">X</div>
                    </div>
                    </div>
                <?php
                }
                ?>
        </div>
    </main>
<script src="../assets/js/script.js"></script>
</body>
</html>