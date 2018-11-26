<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 12.11.2018
 * Time: 19:20
 */

require_once 'testing/Test.php';

/**
 * class for testing the TagController
 */
class TagControllerTest extends Test {
    /**
     * TagControllerTest constructor. Every Test Constructor needs to call his Test Methods.
     */
    public function __construct() {
        parent::__construct();
        $this->getAllTagsTest();
        $this->saveTagInDbTest();
        $this->searchInDbTest();
    }

    /**
     * Tests the Method TagController::getAllTags();
     */
    private function getAllTagsTest() {
        if (!assert(count(TagController::getAllTags())!==0)) {
            parent::addError("getAllTagsTest Failed!");
        }
    }

    /**
     * Tests the Method TagController::saveTagInDb($string);
     */
    private function saveTagInDbTest() {
        $count = count(TagController::getAllTags());
        TagController::saveTagInDb("NeuerTestTag");
        if (!assert(count(TagController::getAllTags())===$count+1)) {
            parent::addError("saveTagInDbTest Failed!");
        }
    }

    /**
     * Tests the Method TagController::searchInDb($string);
     */
    private function searchInDbTest() {
        $count = count(TagController::searchInDb("TestTAG"));
        TagController::saveTagInDb("TestTAGAwesomenessIsAwesome");
        if (!assert(count(TagController::searchInDb("TestTAG"))===$count+1)) {
            parent::addError("searchInDbTest Failed!");
        }
    }
}
