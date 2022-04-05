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
            <li><a href="./">Ajouter</a></li>
        </ul>
    </nav>

<form action="./index.php?page=add&section=add" method="POST">
            <div class="form-group">
                <label for="name">name</label>
                <select name="name" id="name">
                    <option value=""></option>
                    <option value="epeda">epeda</option>
                    <option value="dreamway">dreamway</option>
                    <option value="bultex">bultex</option>
                    <option value="dorsoline">dorsoline</option>
                    <option value="memoryLine">memoryLine</option>
                </select>


            </div>
                <?php
                 if (isset($error["name"])) {
                    ?>
                        <span class="info-error"><?= $error["name"] ?></span>
                    <?php
                 }
                ?>
            <div class="form-group">
                <label for="inputSize">size</label>
                <select name="size" id="inputSize">
                    <option value=""></option>
                    <option value="90x190">90x190</option>
                    <option value="140x190">140x190</option>
                    <option value="180x200">180x200</option>
                    <option value="200x200">200x200</option>
                </select>
            </div>
                <?php
                 if (isset($error["size"])) {
                    ?>
                        <span class="info-error"><?= $error["size"] ?></span>
                    <?php
                 }
                ?>
            <div class="form-group">
                <label for="inputImage">image</label>
                <input type="text" id="inputImage" name="image">
            </div>
                <?php
                 if (isset($error["image"])) {
                    ?>
                        <span class="info-error"><?= $error["image"] ?></span>
                    <?php
                 }
                ?>
            <div class="form-group">
                <label for="inputPrice">price</label>
                <input type="text" id="inputPrice" name="price">
            </div>
                <?php
                 if (isset($error["price"])) {
                    ?>
                        <span class="info-error"><?= $error["price"] ?></span>
                    <?php
                 }
                ?>
            <div class="form-group">
                <label for="inputPromotion">promotion</label>
                <input type="text" id="inputPromotion" name="promotion" value="0">
            </div>
                <?php
                 if (isset($error["promotion"])) {
                    ?>
                        <span class="info-error"><?= $error["promotion"] ?></span>
                    <?php
                 }
                ?>

            <div><button type="submit">envoyer</button></div>
        </form>
</body>
</html>