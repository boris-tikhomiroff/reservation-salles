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
        $login = security($_POST['login']);
        $password = security($_POST['password']);
        $passwordConfirm = security($_POST['passwordConfirm']);

        if (empty($_POST['login'])) {
            $this->errors['login'] = "Your login is not valid";
        } else {
            $check = $this->model->find($login);

            if ($check == true) {
                $this->errors['login'] = "Login not available";
                // echo $errors;
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
            return $add;
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

        $passwordExist = $this->model->catchPassword($login);

        if (!password_verify($password, $passwordExist['password'])) {
            $this->errors['connect'] = "Incorrect login or password";
        } else {
            session_start();

            $_SESSION['user'] = $_POST['login'];
            $_SESSION['userPassword'] = $_POST['password'];
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
        $login = security($_POST['login']);
        $check = $this->model->find($login);

        if ($_POST['login'] !== $_SESSION['user']) {
            $newLogin = $_POST['login'];
            $updateLogin = $this->model->updateLogin($newLogin);
            $_SESSION['user'] = $newLogin;
            header("Refresh:0");
            return $updateLogin;
        } else {
            echo "ne pas update login";
        }
    }
}
