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
        $login = $_POST['login'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['passwordConfirm'];

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
            header('location:index_view.php');
        }
    }

    public function connect()
    {
        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
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
        header("Refresh:0");
        return $disconnect;
    }

    public function update()
    {
        $curentLogin = $_SESSION['user'];
        $curentPassword = $_SESSION['userPassword'];
        $curentId = $_SESSION['userId'];

        $login = $_POST['login'];
        $newlogin = $login;
        $password = $_POST['password'];
        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $newPassword = $hashPassword;

        if (!empty($_POST['login'])) {
            if ($curentLogin === $login) {
                echo "Même login";
            }
        }
    }
}
