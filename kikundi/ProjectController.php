<?php

/**
* author: Sven Zioerjen
* date: 05.11.2018
*/

require_once 'model/ProjectPool.php';
require_once 'controller/TagController.php';
require_once 'model/Tag.php';
require_once 'model/Project.php';

session_id(100);
session_start();

/**
 * class for Controlling all Projects and Pools
 */
class ProjectController {

    /**
     * Standard-URL under which the dispatcher can be found
     */
    public static $DISPATCHER_URL = "../view/src/";



    /**
     * @return array
     * Used for TESTING #TODO Remove on release
     */
    public static function clearAllPools() {
        session_unset();
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
    public static function getAllProjectLikes() {
        foreach($_SESSION['allPools'] as $pool)
        {
            foreach($pool->getProjects() as $project)
            {
                echo "<h3>".$project->getName()."</h3>";
                var_dump($project->getLikes());
            }

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

    /**
     * get all id's which are not used
     */
    public static function getNotUsedID() {
        if (empty($_SESSION['id'])) {
            $_SESSION['id'] = 0;
        }
        $_SESSION['id']++;
        return $_SESSION['id'];
    }

    /**
     * get all tags which are not used
     */
    public static function getNotUsedTagID() {
        if (empty($_SESSION['idTag'])) {
            $_SESSION['idTag'] = 0;
        }
        $_SESSION['idTag']++;
        return $_SESSION['idTag'];
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
    public static function addProjectPool($sessid, $adminName) {
		if (empty($_SESSION['allPools'])) {
            $_SESSION['allPools'] = array();
		}
        $projectpool = new ProjectPool($sessid,"ProjectName", $adminName);
        array_push($_SESSION['allPools'], $projectpool);
        header("Location: /Kikundi/kikundi/view/src/homeadmin?projectpool=".$projectpool->getAdmin()->getHashCode());
	}

    /**
     * get a pool which has an id matching the provided id
     */
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

    /**
     * change the status of member within a project
     */
	public static function changeStatus($project, $member, $status) {
        $project->changeOrDeleteStatus($member, $status);
    }

    /**
     * join a ProjectPool with a pre-shared hashcode by the admin
     */
	public static function joinPool($member, $hashCode)
	{
		foreach($_SESSION['allPools'] as $pool)
		{
			if($pool->registerMember($member, $hashCode))
			{
                header("Location: " . ProjectController::$DISPATCHER_URL . "homeuser?projectpool=".$pool->getAdmin()->getHashCode());
			}
		}
		echo "\nCould not register Member with any Pool: hash didn't match any entry\n";
	}

	public static function redirectToHomeAdmin($pool) {
	    echo 'rediriecting';
        header("Location: " . ProjectController::$DISPATCHER_URL . "homeuser?projectpool=".$pool->getAdmin()->getHashCode());
    }

}




/**
 * run tests
 * You can run them with "url/?testing=all"
 */
if (isset($_GET['testing'])) {
    /**
     * For testing purposes
     */
    echo "<h1>Version 1.00 Beta</h1>";
    echo "There are no error validations or error feedbacks currently";
    require_once 'tests/TestRunner.php';
}

?>
