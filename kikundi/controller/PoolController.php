<?php

    class PoolController
    {
        private $pools;

        public function __construct()
        {
            $this->pools = array();
        }

        public function getPoolByID($id)
        {
            foreach($this->pools as $pool)
            {
                if($pool->hasID($id))
                {
                    return $pool;
                }
            }
            return NULL;
        }
    }

?>