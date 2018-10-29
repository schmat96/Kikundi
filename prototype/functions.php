<?php

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