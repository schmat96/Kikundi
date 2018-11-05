<?php

require_once 'model/ProjectPool.php';

session_id(100);
session_start();

class ProjectController {

	public static function getAllPools() {
		if (empty($_SESSION['allPools'])) {
			$_SESSION['allPools'] = array();
		}
		return $_SESSION['allPools']; 
	}
	
    public static function addProjectPool($sessid, $name, $adminName) {
        array_push($_SESSION['allPools'], new ProjectPool($sessid, $name, $adminName));
    }
}

var_dump(ProjectController::getAllPools());
ProjectController::addProjectPool("Super", "Name", "Admin");
var_dump(ProjectController::getAllPools());
?>