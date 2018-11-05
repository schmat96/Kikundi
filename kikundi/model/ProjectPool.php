<?php


/**
 * Class ProjectPool
 */
class ProjectPool implements ProjectPoolImpl
{

    private $id;
    private $name;
    private $projects;
    private $admin;
    private $members;


    /**
     * Add a new Project to the pool
     */
    public function addProject($project)
    {
        array_push($this->projects, $project);
        // try "$this->projects[] = $project;" to boost performance
    }

    /**
     * Delete a project from the pool
     */
    public function deleteProject($project)
    {
        // TODO: Implement deleteProject() method.
    }

    /**
     * get all projects as an array from the pool
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * assign a new admin (THIS FUNCTION EITHER
     * HAS TO BE DEBATED HEAVILY OR REMOVED)
     *
     * DO NOT IMPLEMENT THIS!!!
     */
    public function assignNewAdmin($member)
    {
        // NOT!! TODO: Implement assignNewAdmin() method.
    }

    /**
     * get the admin of the pool
     */
    public function getAdmin()
    {
        // TODO: Implement getAdmin() method.
    }

    /**
     * get wether the user with the corresponding sessionID
     * is a valid user of the pool
     */
    public function isMemberBySessionID($sessionID)
    {
        // TODO: Implement isMemberBySessionID() method.
    }

    /**
     * get the name of the pool
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * analyze the pool and distribute the memebers
     * to the projects
     */
    public function analyzeProjects()
    {
        // TODO: Implement analyzeProjects() method.
    }
}