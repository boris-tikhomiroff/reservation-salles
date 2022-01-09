<?php
namespace Controllers;

require_once ("../libraries/controllers/User.php");


class User
{
    protected $models;

    public function __construct()
    {
        $this->model = new \Models\User();
    }

    public function register()
    {
        if(empty($_POST['login'])){
            $errors['login'] = "Your login is not valid";
        } else{
            $check = $this->model->find($_POST['login']);
            if($check == true){
                $errors['login'] = "Login not available";
            }
        }

        if(empty($_POST['password'])){
            $errors['password'] = "You must enter a valid password";
        }

        if($_POST['password'] != $_POST['passwordConfirm']){
            $errors['password_confirm'] = "Your password doesn't match";
        }

        if (empty($errors)){
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $add = $this->model->insert($_POST['login'], $password);
            return $add;
            // header('location:index.php');
        }
    }
}