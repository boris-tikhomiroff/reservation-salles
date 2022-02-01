<?php
session_start();
require('../libraries/controllers/Planning.php');
require('../libraries/models/Planning.php');

if (!isset($_SESSION["user"])) {
    header('location:../index.php');
}

if (isset($_POST['submit'])) {
    $newEvent = new \Controllers\Planning();
    $newEvent->insert();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book || Hacienda Recording</title>
    <link rel="stylesheet" href="styles/css/style.css">
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="icon" type="image/x-icon" href="../public/images/favicon.ico">

</head>

<body>
    <?php require_once 'header.php' ?>
    <main class="main_form">

        <?php if (isset($newEvent)) : ?>
            <div class="errors">
                </ul>
                <?php foreach ($newEvent->errors as $error) : ?>
                    <li><?= $error; ?></li>

                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <form method="post" class="form">
            <h1 class="form__title">Book a reservation</h1>
            <div class="form__section form__section1">

                <label for="titre" class="form__label"></label>
                <input type="text" id="titre" name="titre" placeholder="Your activity" class="form__text"><br>
            </div>
            <div class="form__section form__section2">

                <label for="description" class="form__label"></label>
                <textarea id="description" name="description" placeholder="Description" class="form__text"></textarea><br>
            </div>
            <div class="form__section form__section3">

                <label for="dateStart" class="form__label"></label>
                <input type="datetime-local" id="dateStart" name="dateStart" class="form__text" step="3600"><br>
            </div>
            <div class="form__section form__section4">

                <button type="submit " name="submit" class="form__button">Submit</button>
            </div>

        </form>

    </main>
</body>

</html>