<?php
if (isset($_POST['logout'])) {
    // require("../libraries/controllers/User.php");
    // $deco = \Controllers\User::disconnect();
    session_destroy();
    header("location: ../index.php");
}
?>
<header class="header">
    <input id="toggle" type="checkbox"></input>

    <label for="toggle" class="hamburger">
        <div class="hamburger__line--top"></div>
        <div class="hamburger__line--bottom"></div>
    </label>

    <div class="container">
        <nav class="nav">
            <a href="../index.php" class="nav__link">Home</a>
            <a href="../view/planning.php" class="nav__link">Planning</a>

            <?php if (!isset($_SESSION['user'])) : ?>
                <a href="../view/inscription.php" class="nav__link">Inscription</a>
                <a href="../view/connexion.php" class="nav__link">Connexion</a>
            <?php endif; ?>

            <?php if (isset($_SESSION['user'])) : ?>
                <a href="../view/reservation-form.php" class="nav__link">Rerservation-form</a>
                <a href="../view/profil.php" class="nav__link">Profil</a>
                <form action="" method="post" class="nav__link">
                    <button type="submit" name="logout" class="nav__link--btn">Log Out</button>
                </form>
            <?php endif; ?>
        </nav>
    </div>

</header>