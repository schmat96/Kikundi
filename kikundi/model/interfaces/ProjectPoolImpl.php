<?php

    /**
     * author: Keya Kersting
     * date: 05.11.2018
     */

     /**
      * Interface for the ProjectPool class
      */
    interface ProjectPoolImpl{
        /**
         * Add a new Project to the pool
         */
        public function addProject( $project, $tags );

        /**
         * Delete a project from the pool
         */
        public function deleteProject( $project );

        /**
         * get all projects as an array from the pool
         */
        public function getProjects();

        /**
         * assign a new admin (THIS FUNCTION EITHER
         * HAS TO BE DEBATED HEAVILY OR REMOVED)
         * 
         * DO NOT IMPLEMENT THIS!!!
         */
        public function assignNewAdmin( $member );

        /**
         * get the admin of the pool
         */
        public function getAdmin();

        /**
         * get wether the user with the corresponding sessionID
         * is a valid user of the pool
         */
        public function isMemberBySessionID( $sessionID );

        /**
         * get the name of the pool
         */
        public function getName();

        /**
         * analyze the pool and distribute the memebers
         * to the projects
         */
        public function analyzeProjects();

        /**
         * register a new member into the pool with the
         * pre-shared key (hashCode) by the admin
         */
        public function registerMember($member, $hashCode);
    }
?>