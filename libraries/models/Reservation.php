<?php

namespace Models;

require_once("../libraries/models/Model.php");

class Reservation extends Model
{
    // public function selectResa()
    // {
    //     $select = $this->pdo->prepare("SELECT * FROM `reservations`");
    //     $select->execute();
    //     $result = $select->fetch();
    //     return $result;
    // }

    public function add($titre, $description, $debut, $fin)
    {
        $insert = $this->pdo->prepare("INSERT INTO `reservations` (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) values(:titre, :description, :debut, :fin)");

        $insert->execute(array(
            ":titre" => "$titre",
            ":description" => "$description",
            ":debut" => "$debut",
            ":fin" => "$fin"
        ));
    }
}
