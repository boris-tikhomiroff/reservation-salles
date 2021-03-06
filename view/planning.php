<?php
session_start();

use Controllers\Planning;

require_once '../libraries/controllers/Planning.php';
require_once '../libraries/models/Planning.php';

$planning = new Planning();

$start = new DateTime('now');
$start_m = (clone $start)->modify('last monday');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Planning</title>
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="icon" type="image/x-icon" href="../public/images/favicon.ico">

</head>

<body>
    <?php require_once 'header.php' ?>
    <main class="main__planning">
        <h1 class="heading__planning">Week of <?= $planning->toString()->format('d-m'); ?> au <?= $planning->toString()->modify('6 day')->format('d-m-Y'); ?></h1>

        <table>
            <thead>
                <?= $planning->headPlanning(); ?>
            </thead>
            <tbody>
                <?= $planning->bodyTable(); ?>
            </tbody>
        </table>

        <a href="../view/reservation-form.php" class="link__planning">Book an event</a>

    </main>
</body>

</html>