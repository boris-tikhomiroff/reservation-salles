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

// var_dump($_SESSION);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="styles/css/style.css">
</head>

<body>
    <?php require_once 'header.php' ?>
    <main>
        <h1>Reservation</h1>
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
            <label for="titre" class="form__label"></label>
            <input type="text" id="titre" name="titre" placeholder="Your activity" class="form__text"><br>

            <label for="description" class="form__label"></label>
            <textarea id="description" name="description" placeholder="Description" class="form__text"></textarea><br>

            <label for="dateStart" class="form__label"></label>
            <input type="datetime-local" id="dateStart" name="dateStart" class="form__text" step="3600"><br>

            <button type="submit " name="submit" class="form__submit">Submit</button>
        </form>

    </main>
</body>

</html>