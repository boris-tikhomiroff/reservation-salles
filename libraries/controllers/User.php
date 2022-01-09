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
        $add = $this->model->insert($_POST['login'], $_POST['password']);
        return $add;
    }
}