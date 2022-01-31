<?php

namespace Controllers;

require_once("../libraries/controllers/User.php");
require_once("../libraries/utilities.php");
class User
{
    protected $models;
    public $errors = array();

    public function __construct()
    {
        $this->model = new \Models\User();
    }

    public function register()
    {
        $login = validData($_POST['login']);
        $password = validData($_POST['password']);
        $passwordConfirm = validData($_POST['passwordConfirm']);

        if (empty($_POST['login'])) {
            $this->errors['login'] = "Your login is not valid";
        } else {
            $checkLogin = $this->model->getUserInfo($login);
            if ($checkLogin == true) {
                $this->errors['login'] = "Login not available";
            }
        }

        if (empty($password)) {
            $this->errors['password'] = "You must enter a valid password";
        }

        if ($password != $passwordConfirm) {
            $this->errors['password'] = "Your password doesn't match";
        }

        if (empty($this->errors)) {
            $passwordhash = password_hash($password, PASSWORD_BCRYPT);
            $add = $this->model->insert($_POST['login'], $passwordhash);
            header('location:../view/connexion.php');
        }
    }

    public function connect()
    {

        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = validData($_POST['login']);
            $password = validData($_POST['password']);
        } else {
            $this->errors['connect'] = "Please fill in all fields";
        }

        $user = $this->model->GetUserInfo($login);

        if (!password_verify($password, $user['0']['password'])) {
            $this->errors['connect'] = "Incorrect login or password";
        } else {
            session_start();

            $_SESSION['user'] = $user['0']['login'];
            $_SESSION['userPassword'] = $user['0']['password'];
            $_SESSION['userId'] = $user['0']['id'];
            header("location: index_view.php");
        }
    }

    public static function disconnect()
    {
        $disconnect = session_destroy();
        header("location: ../index.php");
        return $disconnect;
    }

    public function update()
    {
        $userId = $_SESSION['userId'];
        $newLogin = validData($_POST['login']);

        $password = validData($_POST['password']);
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $newPassword = $hashPassword;

        $passwordConfirm = validData($_POST['passwordConfirm']);


        if (!empty($newLogin)) {
            $checkLogin = $this->model->getUserInfo($newLogin);

            if (count($checkLogin) == 0) {
                $this->model->updateLogin($newLogin, $userId);
                $_SESSION['user'] = $newLogin;
                $this->errors['login'] = "Votre login à bien été changé";
            } else {
                $this->errors['login'] = "Login not available";
            }
        }

        if (!empty($_POST['password'])) {
            if ($password != $passwordConfirm) {
                $this->errors['password'] = "Your password doesn't match, password has not been changed";
            } else {
                $this->model->updatePassword($newPassword, $userId);
                $_SESSION['userPassword'] = $newPassword;
                // $_SESSION['message'] = "votre mdp à bien été changé";
                $this->errors['password'] = "Password has been changed";
            }
        }
    }
}
