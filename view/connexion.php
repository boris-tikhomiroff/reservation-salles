<?php
require('../libraries/controllers/User.php');
require('../libraries/models/User.php');

session_start();
error_reporting(0);

if (isset($_POST['submit'])) {
    $user = new \Controllers\User();
    $user->connect();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in || Hacienda Recording</title>
    <link rel="stylesheet" href="../public/css/styles.css">
    <link rel="icon" type="image/x-icon" href="../public/images/favicon.ico">

</head>

<body>
    <?php require_once 'header.php' ?>
    <main class="main_form">
        <?php if (isset($user)) : ?>
            <div class="errors">
                </ul>
                <?php foreach ($user->errors as $error) : ?>
                    <li><?= $error; ?></li>

                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="post" class="form">
            <h1 class="form__title">Log in</h1>
            <div class="form__section form__section1">
                <label for="login"></label>
                <input type="text" id="login" name="login" placeholder="Your login" class="form__text"><br>
            </div>

            <div class="form__section form__section2">
                <label for="password" class="form__label"></label>
                <input type="password" id="password" name="password" placeholder="Your password" class="form__text"><br>
            </div>

            <div class="form__section  form__section3">
                <button type="submit " name="submit" class="form__button">Submit</button>
            </div>
        </form>

    </main>
</body>

</html>