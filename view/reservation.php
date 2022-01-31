<?php

session_start();
// var_dump($_SESSION);
require_once('../libraries/controllers/Planning.php');
require_once('../libraries/models/Planning.php');

// if (!isset($_SESSION["user"])) {
//     header('location:../index.php');
// }
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
    <title>Home</title>
</head>

<body>
    <?php require_once "../view/header.php" ?>
    <h1> Reservation</h1>

    <?php $planning = new \Controllers\Planning() ?>
    <?php
    $infos = $planning->eventInfo($_GET['reservation']);
    ?>
    <?php foreach ($infos as $info) : ?>
        <ul>
            <li><?= $info['login'] ?></li>
            <li><?= $info['titre'] ?></li>
            <li><?= $info['description'] ?></li>
            <li><?= $info['debut'] ?></li>
            <li><?= $info['fin'] ?></li>
        </ul>
    <?php endforeach; ?>

    <!-- test formatage  -->

    <!-- <?php $phpdate = strtotime($info['debut']);
            $mysqldate = date('l d-m H:i:s', $phpdate);
            echo $mysqldate; ?> -->
</body>

</html>