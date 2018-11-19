<?php
    if ($_GET['testing']=='reset') {
        ProjectController::clearAllPools();
    }
    else if ($_GET['testing']=='all') {
        $toTest = array();

        echo "<h1>Starting TestRunner.php:</h1><br>";

        require_once 'controller/TagControllerTest.php';
        $tct = new TagControllerTest();
        array_push($toTest, $tct);

        foreach ($toTest as $test) {
            if (count ($test->errors)===0) {
                echo "<h1>Keine Errors in ".$test->getName()." gefunden.</h1>";
            } else {
                echo "<h1 style='background-color: red'>Folgende Errors wurden in ".$test->getName()." gefunden:</h1>";
                var_dump($tct->errors);
            }
        }


    } else {
        echo "<h2>TESTING: All ADMIN HASHCODES</h2>";
        ProjectController::getAllAdminHashCodes();
        echo "<br>";
        echo "<h2>TESTING: All MEMBER HASHCODES</h2>";
        ProjectController::getAllMembersHashCodes();
        echo "<h2>TESTING: All TAGS</h2>";
        var_dump(TagController::getAllTags());
        echo "<br>";
        echo "<h2>TESTING: All Projects Likes</h2>";
        var_dump(ProjectController::getAllProjectLikes());
        echo "<br>";
        echo "<h2>TESTING: IF YOU CAN INTERPRET THIS YOU ARE GODLIKE</h2>";
        var_dump(ProjectController::getAllPools());
    }
?>