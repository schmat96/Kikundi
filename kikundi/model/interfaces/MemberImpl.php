<?php
    interface MemberImpl {
        /**
         * returns a hash (for Admins) as a string
         */
        public function getHashCode();

        /**
         * returns the name of the memeber as a string
         */
        public function getName();
    }
?>