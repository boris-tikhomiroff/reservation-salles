<?php

function security($input){
    $v1  = strip_tags($input);
    $v1 = htmlentities($input);
    $v1 = htmlspecialchars($input);
    $resultat = $v1;
    return $resultat;
}