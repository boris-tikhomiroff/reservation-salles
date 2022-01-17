<?php

namespace Models;

require_once("../libraries/models/Model.php");

class User extends Model
{
    public function find($login)
    {
        $findLogin = $this->pdo->prepare("SELECT `login` FROM `utilisateurs` WHERE `login` = '$login'");
        $findLogin->execute();
        $FindLoginResult = $findLogin->fetchAll();
        return $FindLoginResult;
    }

    public function catchPassword($login)
    {
        $catchPassword = $this->pdo->prepare("SELECT `password` FROM `utilisateurs` WHERE `login` = '$login'");
        $catchPassword->execute();
        $Result = $catchPassword->fetch();
        return $Result;
    }

    public function insert($login, $password)
    {
        $queryInsert = $this->pdo->prepare("INSERT INTO `utilisateurs` (`login`, `password`) values(:login, :password)");
        $queryInsert->execute(array(
            ":login" => "$login",
            ":password" => "$password"
        ));
    }

    public function updateLogin($login)
    {
        $queryUpdateLogin = $this->pdo->prepare("UPDATE `utilisateurs` SET `login` = :login");
        $queryUpdateLogin->execute(array(
            ":login" => "$login"
        ));
    }

    public function updatePassword($password)
    {
        $queryUpdateLogin = $this->pdo->prepare("UPDATE `utilisateurs` SET `password` = :password");
        $queryUpdateLogin->execute(array(
            ":password" => "$password"
        ));
    }
}
