<?php
session_start();
// var_dump($_SESSION);
require_once('../libraries/models/User.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>

    <?php require_once "../view/header.php" ?>
    <main class="main_home">
        <section class="main__leftContent">
            <h1 class="heading">Hacienda</br>Recording</br>Studio</br></h1>
        </section>
        <section class="main__rightContent">
            <div class="slider">
                <figure class="slider__container">
                    <img src="../public/images/studio.jpg" alt="" class="slider__images">
                    <img src="../public/images/studio2.jpg" alt="">
                    <img src="../public/images/studio.jpg" alt="">
                    <img src="../public/images/studio3.jpg" alt="">
                    <img src="../public/images/studio.jpg" alt="">
                </figure>
            </div>
        </section>

    </main>
</body>

</html>