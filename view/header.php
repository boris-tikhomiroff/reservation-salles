<?php
if (isset($_POST['logout'])) {
    require("../libraries/controllers/User.php");
    $user = \Controllers\User::disconnect();
}
?>
<header class="header">
    <nav class="header__nav">
        <ul>
            <li class="header__logoContainer">
                <a href="../index.php"><img src="../public/images/temporary_logo.png" alt="" class="logocontainer__logo"></a>
            </li>
            <li class="nav__item"><a href="../view/planning.php">Planning</a></li>
            <?php if (!isset($_SESSION['user'])) : ?>
                <li class="nav__item"><a href="../view/inscription.php">Inscription</a></li>
                <li class="nav__item"><a href="../view/connexion.php">Connexion</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['user'])) : ?>
                <li class="nav__item"><a href="../view/reservation-form.php">Rerservation-form</a></li>
                <li class="nav__item"><a href="../view/profil.php">Profil</a></li>
                <li class="nav__item">
                    <form action="" method="post">
                        <button type="submit" name="logout">Log Out</button>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>