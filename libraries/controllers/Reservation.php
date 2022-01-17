<?php

namespace Controllers;

require_once("../libraries/controllers/Reservation.php");
require_once("../libraries/utilities.php");

class Reservation
{
    protected $models;

    public function __construct()
    {
        $this->model = new \Models\Reservation();
    }

    // public function select()
    // {
    //     $recup = $this->model->selectResa();
    //     return $recup;
    // }


}
