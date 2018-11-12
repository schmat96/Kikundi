<?php

require_once 'model/ProjectPool.php';

session_id(100);
session_start();

class ProjectController {

    /**
     * @return array
     * Used for TESTING #TODO Remove on release
     */
    public static function clearAllPools() {
        $_SESSION['allPools'] = array();
    }

    /**
     * @return array
     * Used for TESTING #TODO Remove on release
     */
    public static function getAllAdminHashCodes() {
        foreach($_SESSION['allPools'] as $pool)
        {
            echo $pool->getAdmin()->getHashCode()."<br>";
        }
    }

    /**
     * @return array
     * Used for TESTING #TODO Remove on release
     */
    public static function getAllMembersHashCodes() {
        foreach($_SESSION['allPools'] as $pool)
        {
            foreach($pool->getMembers() as $member)
            {
                echo $member->getHashCode()."<br>";
            }
        }
    }

    public static function getNotUsedID() {
        if (empty($_SESSION['allPools'])) {
            $_SESSION['id'] = 0;
        }
        $_SESSION['id']++;
        return $_SESSION['id'];
    }


	public static function getAllPools() {
	 //$_SESSION['allPools'] = array();
		if (empty($_SESSION['allPools'])) {
            $_SESSION['allPools'] = array();
		}
		return $_SESSION['allPools'];
	}
	
	/**
	 * Add a projectpool to all the pools in the
	 * global array $GLOBALS['allPools']
	 */
    public static function addProjectPool($sessid, $name, $adminName) {
		if (empty($_SESSION['allPools'])) {
            $_SESSION['allPools'] = array();
		}
        array_push($_SESSION['allPools'], new ProjectPool($sessid, $name, $adminName));
	}
	
	public static function getPoolByID($id)
	{
		if (empty($_SESSION['allPools'])) {
            $_SESSION['allPools'] = array();
		}
		
		foreach($_SESSION['allPools'] as $pool)
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
		foreach($_SESSION['allPools'] as $pool)
		{
			if($pool->registerMember($member, $hashCode))
			{
				return;
			}
		}
		echo "\nCould not register Member with any Pool: hash didn't match any entry\n";
	}

}

//ProjectController::clearAllPools();

if (isset($_GET['testing'])) {
    if ($_GET['testing']=='reset') {
        ProjectController::clearAllPools();
    }
    echo "<h1>TESTING: All ADMIN HASHCODES</h1>";
    ProjectController::getAllAdminHashCodes();
    echo "<br>";
    echo "<h1>TESTING: All MEMBER HASHCODES</h1>";
    ProjectController::getAllMembersHashCodes();
    echo "<br>";
    echo "<h1>TESTING: IF YOU CAN INTERPRET THIS YOU ARE GODLIKE</h1>";
    var_dump(ProjectController::getAllPools());
}

//ProjectController::addProjectPool("Super", "Name", "Admin");
//var_dump(ProjectController::getAllPools());
?>