<?php
/**
* author: Sven Zioerjen
* date: 05.11.2018
*/
session_id(100);
session_start();
require_once "functions.php";

if (!isset($_SESSION['counter'])){
    $_SESSION['counter'] = 0;
}
?>

    <h1>Hello World</h1>

<?php

$allEntries = getAllDbEntries(connectToDB());
foreach ($allEntries as $entry) {
    echo '<br>';
    foreach ($entry as $value) {
        echo $value, ' ';
    }
}
?>

    <form action="addToDb.php" method="post">
        Vorname: <input type="text" name="prename"><br>
        Name: <input type="text" name="name"><br>
        Jahrgang: <input type="number" name="year"><br>
        Wohnort: <input type="text" name="location"><br>
        <input type="submit">
    </form>

<?php

$object1 = new CustomObject();
$object1->name = "Sven";
$object2 = new CustomObject();
$object2->name = "Kiddo";


$items = array($object1, $object2);

foreach ($items as $object) {
    echo $object->name;
    echo '<br>';
}

$hashmap = array();
$hashmap['index1'] = 1;
$hashmap['index2'] = 2;

echo '<br>';
echo $hashmap['index1'];
echo $hashmap['index2'];
echo '<br>';

class CustomObject
{
    public $name;
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['increase']))
{
    unset($_POST['increase']);
    func();
}

function func()
{
    $_SESSION['counter']++;
}
?>
<p>Counter: <?php echo $_SESSION['counter']; ?> </p>
<form action="index.php" method="post">
    <input type="submit" name="increase" value="GO" />
</form>
