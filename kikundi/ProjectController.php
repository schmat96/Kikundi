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
	
	/**
	 * Add a projectpool to all the pools in the
	 * global array $GLOBALS['allPools']
	 */
    public static function addProjectPool($sessid, $name, $adminName) {
        array_push($GLOBALS['allPools'], new ProjectPool($sessid, $name, $adminName));
	}
	
	public static function getPoolByID($id)
	{
		if (empty($GLOBALS['allPools'])) {
			$GLOBALS['allPools'] = array();
		}
		
		foreach($GLOBALS['allPools'] as $pool)
		{
			if($pool->hasID($id))
			{
				return $pool;
			}
		}
		echo "\nCould not find any pool by id\n";
		return NULL;
	}

	public static function joinPool($member, $hashCode)
	{
		foreach($GLOBALS['allPools'] as $pool)
		{
			if($pool->registerMember($member, $hashCode))
			{
				return;
			}
		}
		echo "\nCould not register Member with any Pool: hash didn't match any entry\n";
	}

}

var_dump(ProjectController::getAllPools());
//ProjectController::addProjectPool("Super", "Name", "Admin");
//var_dump(ProjectController::getAllPools());
?>