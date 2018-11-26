<?php

    /**
     * author: Keya Kersting
     * date: 05.11.2018
     */

     /**
      * Interface for the MemberController
      */
    interface MembercontrollerImpl {
        /**
         * The given Member likes the given project
         * return void
         */
        public function likeProject( $member, $project );

        /**
         * A member of type Member will be approved in the
         * given project.
         * return void
         */
        public function approve( $project, $member );

    }
?>