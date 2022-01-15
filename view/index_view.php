<?php
session_start();
// session_unset();
var_dump($_SESSION);
require_once('../libraries/models/User.php');

// $user = new \Models\User();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php require_once "../view/header.php" ?>
    <h1>Bonjour <?= $_SESSION['user'] ?? "" ?></h1>
</body>

</html>