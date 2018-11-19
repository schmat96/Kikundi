<?php



require_once 'model/ProjectPool.php';
require_once 'controller/TagController.php';
require_once 'model/Tag.php';
require_once 'model/Project.php';

session_id(100);
session_start();


class ProjectController {

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

    public static function getNotUsedID() {
        if (empty($_SESSION['id'])) {
            $_SESSION['id'] = 0;
        }
        $_SESSION['id']++;
        return $_SESSION['id'];
    }

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

	public static function changeStatus($project, $member, $status) {
        $project->changeOrDeleteStatus($member, $status);
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


echo "<h1>Version 1.00 Beta</h1>";
echo "There are no error validations or error feedbacks currently";

if (isset($_GET['testing'])) {
    require_once 'tests/TestRunner.php';
}

?>