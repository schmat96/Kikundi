<?php
 interface ProjectPoolImpl{
    public function addProject();
    public function deleteProject( $project );
    public function getProjects( $project );
    public function assignNewAdmin( $member );
    public function getAdmin();
    public function isMemberBySessionID( $sessionID );
    public function getName();
    public function analyzeProjects();
	}
?>