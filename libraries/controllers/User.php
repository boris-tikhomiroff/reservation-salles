<?php

namespace Controllers;

require_once("../libraries/controllers/User.php");
require_once("../libraries/utilities.php");

class User
{
    protected $models;

    public function __construct()
    {
        $this->model = new \Models\User();
    }

    public function register()
    {
        $login = security($_POST['login']);
        $password = security($_POST['password']);
        $passwordConfirm = security($_POST['passwordConfirm']);

        if (empty($login)) {
            $errors = "Your login is not valid";
            echo $errors;
        } else {
            $check = $this->model->find($login);
            if ($check == true) {
                $errors = "Login not available";
                echo $errors;
            }
        }

        if (empty($password)) {
            $errors = "You must enter a valid password";
            echo $errors;
        }

        if ($password != $passwordConfirm) {
            $errors = "Your password doesn't match";
            echo $errors;
        }

        if (empty($errors)) {
            $passwordhash = password_hash($password, PASSWORD_BCRYPT);
            $add = $this->model->insert($_POST['login'], $passwordhash);
            header('location:index_view.php');
            return $add;
        }
    }

    public function connect()
    {
    }
}
