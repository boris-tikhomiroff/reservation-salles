<?php

/**
 * Fonction qui sécurise les données fournies par un utilisateur
 *
 */
function validData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
