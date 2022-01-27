<?php
require('../libraries/controllers/User.php');
require('../libraries/models/User.php');

session_start();

// if (isset($_SESSION["user"])) {
//     header('location:../index.php');
// }

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
    <title>Connexion</title>
</head>

<body>
    <?php require_once 'header.php' ?>
    <main>
        <?php if (isset($user)) : ?>
            <div class="errors">
                <!-- <p>You have not completed the form correctly.</p> -->
                </ul>
                <?php foreach ($user->errors as $error) : ?>
                    <li><?= $error; ?></li>

                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        <h1>Connexion</h1>

        <form method="post" class="form">
            <label for="login" class="form__label"></label>
            <input type="text" id="login" name="login" placeholder="Your login" class="form__text"><br>

            <label for="password" class="form__label"></label>
            <input type="password" id="password" name="password" placeholder="Your password" class="form__text"><br>

            <button type="submit " name="submit" class="form__submit">Submit</button>
        </form>

    </main>
</body>

</html>