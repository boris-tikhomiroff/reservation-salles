<?php

namespace Models;

require_once("../libraries/models/Model.php");

class User extends Model
{
    public function GetUserInfo($login)
    {
        $getUser = $this->pdo->prepare("SELECT * FROM `utilisateurs` WHERE `login` = '$login'");
        $getUser->execute();
        $Result = $getUser->fetchAll();
        return $Result;
    }


    public function findUserInfo($id)
    {
        $findUser = $this->pdo->prepare("SELECT login,password FROM `utilisateurs` WHERE `id`= '$id'");
        $findUser->execute();
        $Result = $findUser->fetch();
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

    public function updateLogin($newLogin, $id)
    {
        $updateLogin = $this->pdo->prepare("UPDATE `utilisateurs` SET `login` = :login WHERE `id` = $id");
        $updateLogin->execute(array(
            ":login" => "$newLogin"
        ));
        return $updateLogin;
    }

    public function updatePassword($newPassword, $login)
    {
        $updatePassword = $this->pdo->prepare("UPDATE `utilisateurs` SET `password` = :password");
        $updatePassword->execute(array(
            ":password" => "$newPassword"
        ));
        return $updatePassword;
    }
}
