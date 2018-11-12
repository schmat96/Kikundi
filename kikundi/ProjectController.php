<?php

require_once 'model/ProjectPool.php';

session_id(100);
session_start();

class ProjectController {

	public static function getAllPools() {
	 //$_SESSION['allPools'] = array();
		if (empty($GLOBALS['allPools'])) {
			$GLOBALS['allPools'] = array();
		}
		return $GLOBALS['allPools']; 
	}
	
    public static function addProjectPool($sessid, $name, $adminName) {
        array_push($GLOBALS['allPools'], new ProjectPool($sessid, $name, $adminName));
	}
	
	public static function getPoolByID($id)
        {
            foreach($GLOBALS['allPools'] as $pool)
            {
                if($pool->hasID($id))
                {
                    return $pool;
                }
            }
            return NULL;
        }
}

var_dump(ProjectController::getAllPools());
//ProjectController::addProjectPool("Super", "Name", "Admin");
//var_dump(ProjectController::getAllPools());
?>