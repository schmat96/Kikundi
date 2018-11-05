<?php

    /**
     * author: Keya Kersting
     * date: 05.11.2018
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

        /**
         * A member (the session-owner) can join a projectpool
         * with the preshared hash by the admin of that pool
         */
        public function joinProject( $hash );

    }
?>