<?php
/**
* author: Sven Zioerjen
* date: 05.11.2018
*/

$servername = "localhost";
$username = "root";
$password = "";
$db = "prototypedatabase";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

$prename = $_POST["prename"];
$name = $_POST["name"];
$year = $_POST["year"];
$location = $_POST["location"];

$sql = "INSERT INTO persons (Vorname, Name, Jahrgang, Wohnort)
VALUES ('$prename', '$name', '$year', '$location')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

header('Location: ../index.php')
?>
