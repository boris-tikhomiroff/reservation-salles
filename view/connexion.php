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
    <link rel="stylesheet" href="../public/css/styles.css">
</head>

<body>
    <?php require_once 'header.php' ?>
    <main class="main_form">
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

        <form method="post" class="form">
            <h1 class="formTittle">Connexion</h1>
            <div class="formSection formSection1">
                <label for="login"></label>
                <input type="text" id="login" name="login" placeholder="Your login" class="formText"><br>
            </div>

            <div class="formSection formSection2">
                <label for="password" class="form__label"></label>
                <input type="password" id="password" name="password" placeholder="Your password" class="formText"><br>
            </div>

            <div class="formSection  formSection3">
                <button type="submit " name="submit" class="formButton">Submit</button>
            </div>
        </form>

    </main>
</body>

</html>