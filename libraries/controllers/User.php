<?php
namespace Controllers;

require_once ("../libraries/controllers/User.php");

class User
{
    protected $models;
    public $errors= array();

    public function __construct()
    {
        $this->model = new \Models\User();
    }

    public function register()
    {
        if(empty($_POST['login'])){
            $errors = "Your login is not valid";
            echo $errors;
        } else{
            $check = $this->model->find($_POST['login']);
            if($check == true){
                $errors= "Login not available";
                echo $errors;
            }
        }

        if(empty($_POST['password'])){
            $errors ="You must enter a valid password";
            echo $errors;
        }

        if($_POST['password'] != $_POST['passwordConfirm']){
            $errors = "Your password doesn't match";
            echo $errors;
        }

        if (empty($errors)){
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $add = $this->model->insert($_POST['login'], $password);
            header('location:index_view.php');
            return $add;
        }
    }
}