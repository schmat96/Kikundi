<?php

    /**
     * author: Keya Kersting
     * date: 05.11.2018
     */

     /**
      * Interface for the Project class
      */
    interface ProjectImpl{
        /**
         * get the name of the project
         */
        public function getName();

        /**
         * get the description of the project
         */
        public function getDescription();

        /**
         * get the tags of the project as an array
         * of tags
         */
        public function getTags();
    }
?>