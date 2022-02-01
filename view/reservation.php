<?php

session_start();
require_once('../libraries/controllers/Planning.php');
require_once('../libraries/models/Planning.php');

if (!isset($_GET['reservation'])) {
    header('location:../view/index_view.php');
}
setlocale(LC_TIME, "fr_FR");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="icon" type="image/x-icon" href="../public/images/favicon.ico">

</head>

<body>
    <?php require_once "../view/header.php" ?>
    <main class="main__planning">
        <div class="reservation_container">
            <h1>Reservation</h1>

            <?php $planning = new \Controllers\Planning() ?>
            <?php
            $infos = $planning->eventInfo($_GET['reservation']);
            ?>
            <?php foreach ($infos as $info) : ?>
                <ul>
                    <li>Contact : <?= $info['login'] ?></li>
                    <li>Titre : <?= $info['titre'] ?></li>
                    <li>Description : <?= $info['description'] ?></li>
                    <li>Start : <?= $info['debut'] ?></li>
                    <li>End : <?= $info['fin'] ?></li>
                </ul>
            <?php endforeach; ?>
        </div>

        <a href="../view/planning.php" class="link__planning">Go back</a>
    </main>

</body>

</html>