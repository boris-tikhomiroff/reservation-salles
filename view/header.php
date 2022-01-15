<?php
if (isset($_POST['logout'])) {
    require("../libraries/controllers/User.php");
    $user = \Controllers\User::disconnect();
}
?>
<header class="header">
    <div class="header__logoContainer">
        <a href="../index.php"><img src="../public/images/temporary_logo.png" alt="" class="logocontainer__logo"></a>
    </div>
    <nav class="header__nav">
        <ul>
            <li class="nav__item"><a href="../view/inscription.php">Inscription</a></li>
            <li class="nav__item"><a href="../view/connexion.php">Connexion</a></li>
            <li class="nav__item"><a href="#">Profil</a></li>
            <li class="nav__item"><a href="#">Planning</a></li>
            <li class="nav__item"><a href="#">Rerservation-form</a></li>
            <li class="nav__item">
                <form action="" method="post">
                    <button type="submit" name="logout">Log Out</button>
                </form>
            </li>
        </ul>
    </nav>
</header>