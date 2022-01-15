<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="styles/css/style.css">
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
        <h1>Profil</h1>
        <form method="post" class="form">
            <label for="login" class="form__label"></label>
            <input type="text" id="login" name="login" value="<?= $_SESSION['user'] ?>" class="form__text"><br>

            <label for="password" class="form__label"></label>
            <input type="password" id="password" name="password" placeholder="Your password" class="form__text"><br>

            <label for="passwordConfirm" class="form__label"></label>
            <input type="password" id="passwordConfirm" name="passwordConfirm" placeholder="Confirm your password" class="form__text"><br>

            <button type="submit " name="submit" class="form__submit">Submit</button>
        </form>

    </main>
</body>

</html>