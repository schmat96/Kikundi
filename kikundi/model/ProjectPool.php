<?php

require_once 'interfaces/ProjectPoolImpl.php';

/**
 * Class ProjectPool
 * The Project class contains all the information a project can hold.
 */
class ProjectPool implements ProjectPoolImpl
{

    private $id;
    private $name;
	private $admin;


    public function __construct($id, $name, $admin) {
        $this->id = $id;
        $this->name = $name;
        $this->admin = $admin;
    }
	
	public function print() {
		return ($id.$name);
	}
	
	public function addProject() {
		
	}
    public function deleteProject( $project ) {
		
	}
    public function getProjects( $project ) {
		
	}
    public function assignNewAdmin( $member ) {
		
	}
    public function getAdmin() {
		
	}
    public function isMemberBySessionID( $sessionID ) {
		
	}
    public function getName() {
		
	}
    public function analyzeProjects() {
		
	}
	
}