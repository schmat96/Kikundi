<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 12.11.2018
 * Time: 19:20
 */
class TagControllerTest {

    /**
     * @var array Holds all Error Messages
     */
    public $errors = array();

    /**
     * TagControllerTest constructor. Every Test Constructor needs to call his Test Methods.
     */
    public function __construct() {
        $this->getAllTagsTest();
        $this->saveTagInDbTest();
        $this->searchInDbTest();
    }

    /**
     * Tests the Method TagController::getAllTags();
     */
    private function getAllTagsTest() {
        if (!assert(count(TagController::getAllTags())!==0)) {
            $this->addError("getAllTagsTest Failed!");
        }
    }

    /**
     * Tests the Method TagController::saveTagInDb($string);
     */
    private function saveTagInDbTest() {
        $count = count(TagController::getAllTags());
        TagController::saveTagInDb("NeuerTestTag");
        if (!assert(count(TagController::getAllTags())===$count+1)) {
            $this->addError("saveTagInDbTest Failed!");
        }
    }

    /**
     * Tests the Method TagController::searchInDb($string);
     */
    private function searchInDbTest() {
        $count = count(TagController::searchInDb("TestTAG"));
        TagController::saveTagInDb("TestTAGAwesomenessIsAwesome");
        if (!assert(count(TagController::searchInDb("TestTAG"))===$count+1)) {
            $this->addError("searchInDbTest Failed!");
        }
    }

    /**
     * @param $string Adds a new Error message to the array provided by the method call
     */
    private function addError($string) {
        array_push($this->errors,$string);
    }
}

/**
 * Every Test Class has to have the same structure here to be able to be interpreted by the ProjectController.
 */
$tct = new TagControllerTest();
if (count ($tct->errors)===0) {
    echo "<h1>Keine Errors in TagControllerTest gefunden.</h1>";
} else {
    echo "<h1 style='background-color: red'>Folgende Errors wurden in TagControllerTest gefunden:</h1>";
    var_dump($tct->errors);
}



