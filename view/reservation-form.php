<?php
session_start();
require('../libraries/controllers/Reservation.php');
require('../libraries/models/Reservation.php');

if (isset($_POST['submit'])) {
    // $resa = new \Controllers\Reservation();
    // var_dump($resa->select());
    var_dump($_POST);
}

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
        <form method="post" class="form">
            <label for="titre" class="form__label"></label>
            <input type="text" id="titre" name="titre" placeholder="Your activity" class="form__text"><br>

            <label for="description" class="form__label"></label>
            <textarea id="description" name="description" placeholder="Description" class="form__text"></textarea><br>

            <label for="dateStart" class="form__label"></label>
            <input type="datetime-local" id="dateStart" name="dateStart" class="form__text" step="3600"><br>

            <label for="dateEnd" class="form__label"></label>
            <input type="datetime-local" id="dateEnd" name="dateEnd" class="form__text" step="3600"><br>

            <button type="submit " name="submit" class="form__submit">Submit</button>
        </form>

    </main>
</body>

</html>