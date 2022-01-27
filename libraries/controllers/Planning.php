<?php

namespace Controllers;

use DateTime;

require_once("../libraries/controllers/Planning.php");
require_once("../libraries/utilities.php");

class Planning
{
    protected $models;
    // public $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    // public $hours =  ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00'];
    // public $day;
    public $errors = array();

    public function __construct()
    {
        $this->model = new \Models\Planning();
        // $this->day = date("d");
    }

    public function insert()
    {
        $userId = $_SESSION['userId'];
        $titre = validData($_POST['titre']);
        $description = validData($_POST['description']);

        date_default_timezone_set('Europe/Paris');
        $userDate = $_POST['dateStart'];

        // Recupération du début de la date
        $timestampStart = strtotime($userDate);
        $startDate = date('Y-m-d H:i:s', $timestampStart);

        // Recupération de la fin de la date
        $timestampEnd = strtotime($userDate . "+1hours");
        $endDate = date('Y-m-d H:i:s', $timestampEnd);

        // $hours = strtotime($userDate);
        $authorizedHours = getdate($timestampStart);

        if (empty($titre) || empty($description) || empty($userDate)) {
            $this->errors['hour'] = "Veuillez renseigner un titre, une description et un horaire";
        } else {

            if ($authorizedHours['hours'] < 8 || $authorizedHours['hours'] > 19) {
                $this->errors['hour'] = "Vous ne pouvez reserver que entre 08h et 19h";
            }
            if ($authorizedHours['wday'] >= 6) {
                $this->errors['hour'] = "Vous ne pouvez reserver uniquement du lundi au vendredi et non pas le weekend";
            }

            if (!empty($userDate)) {
                $verif = $this->model->verifResa($startDate);
                if ($verif == true) {
                    $this->errors['hour'] = "Crénaux non dispo";
                }
            }
            if (empty($this->errors)) {
                $addEvent = $this->model->insertEvent($titre, $description, $startDate, $endDate, $userId);
                return $addEvent;
            }
        }
    }


    /**
     * Methode qui récuppère l'event selon son heure de début
     *
     * @param [type] $debut
     * @return void
     */
    public function startEvent($heure)
    {
        $startEvent = $this->model->getStartEvent($heure);
        return $startEvent;
    }

    /**
     * Methode qui récuppère toutes les infos de l'évenement selon son id
     */
    public function eventInfo($id)
    {
        $eventInfo = $this->model->getEventInfo($id);
        return $eventInfo;
    }

    public function verifResa($hour)
    {
        $hour = $this->model->verifResa($hour);
        return $hour;
    }

    public function toString()
    {
        $start = new DateTime('now');
        $startWeek = (clone $start)->modify('last monday');

        return $startWeek;
    }
}
