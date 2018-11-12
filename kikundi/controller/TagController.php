<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 12.11.2018
 * Time: 18:46
 */


    class TagController {

        private static $defaultTags = ['Java', 'C#','C++', 'Fussball', 'Football', 'Venezuela', 'Javadocs', 'C Plus Plus'];

        public static function getAllTags() {
         //$_SESSION['allPools'] = array();
            if (empty($_SESSION['tags'])) {
                $_SESSION['tags'] = array();
                //#TODO GET TAGS FROM DB
                TagController::fillTagArrayWithDefaultValues();
            }
            return $_SESSION['tags'];
        }

        private static function fillTagArrayWithDefaultValues() {
            foreach (TagController::$defaultTags as $default) {
                TagController::saveTagInDb($default);
            }
        }

        public static function saveTagInDb($string) {
            $tag = new Tag($string);
            array_push( $_SESSION['tags'], $tag);
            //#TODO SAVE IN DB
        }



        public static function searchInDb($string) {
            $returnedTags = array();
            foreach(TagController::getAllTags() as $tag) {
                if (substr( strtoupper ($tag->getName()), 0, strlen ($string)) === strtoupper($string)) {
                    array_push($returnedTags, $tag);
                }
            }
            return $returnedTags;
        }
    }
