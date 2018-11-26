<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 12.11.2018
 * Time: 18:46
 */

    /**
     * Class for modfiying, adding, searching and deleting tags
     * for the projects
     */
    class TagController {

        /**
         * default tags to be filled into the tag array.
         * They won't be saved to the database.
         */
        private static $defaultTags = ['Java', 'C#','C++', 'Fussball', 'Football', 'Venezuela', 'Javadocs', 'C Plus Plus'];

        /**
         * fetch all Tags from Database
         */
        public static function getAllTags() {
         //$_SESSION['allPools'] = array();
            if (empty($_SESSION['tags'])) {
                $_SESSION['tags'] = array();
                //#TODO GET TAGS FROM DB
                TagController::fillTagArrayWithDefaultValues();
            }
            return $_SESSION['tags'];
        }

        /**
         * fill tags with the provided $defaultTags array
         */
        private static function fillTagArrayWithDefaultValues() {
            foreach (TagController::$defaultTags as $default) {
                TagController::saveTagInDb($default);
            }
        }

        /**
         * Save a new tag, provided as a string, into the database
         */
        public static function saveTagInDb($string) {
            $tag = new Tag($string);
            array_push( $_SESSION['tags'], $tag);
            //#TODO SAVE IN DB
        }


        /**
         * search the database for a tag containing the provided string
         */
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
