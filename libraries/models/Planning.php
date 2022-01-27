<?php

namespace Models;

use DateTime;

require_once("../libraries/models/Model.php");

class Planning extends Model
{
    public function insertEvent($titre, $description, $debut, $fin, $userId)
    {
        $insert = $this->pdo->prepare("INSERT INTO `reservations` (`titre`, `description`, `debut`, `fin`, `id_utilisateur`) values(?, ?, ?, ?, ?)");

        $insert->execute(array(
            "$titre",
            "$description",
            "$debut",
            "$fin",
            "$userId"
        ));
    }

    /**
     * Methode qui récuppère l'event selon son heure de début
     *
     * @param [type] $debut
     * @return void
     */
    public function getStartEvent($debut)
    {
        $query = $this->pdo->prepare("SELECT reservations.titre, reservations.debut, utilisateurs.login, reservations.id FROM reservations INNER JOIN utilisateurs ON utilisateurs.id = reservations.id_utilisateur WHERE `debut` = '$debut'");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * Methode qui récuppère toutes les infos de l'évenement selon son id
     */
    public function getEventInfo($id)
    {
        $query = $this->pdo->prepare("SELECT * FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE reservations.id = $id");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    public function verifResa($hour)
    {
        $query = $this->pdo->prepare("SELECT `debut` FROM reservations WHERE debut= '$hour'");
        $query->execute();
        $result = $query->fetch();
        return $result;
    }
}
