<?php

/**
* author: Sven Zioerjen
* date: 05.11.2018
*/

function connectToDB()
{
    $mysqli = new mysqli("localhost", "user2", "user2", "prototypedatabase");
    return $mysqli;
}

function getAllDbEntries($db){
    $result = $db->query("SELECT * FROM persons");
    return $result;
}



?>
