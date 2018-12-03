<?php
/**
* author: Kevin Looser
* date: 05.11.2018
*/
require_once 'interfaces/ProjectPoolImpl.php';
require_once 'Member.php';

/**
 * Class ProjectPool
 * The Project class contains all the information a project can hold.
 */
class ProjectPool implements ProjectPoolImpl
{

    /**
     * id des Pools die indiviuell ist
     */
    private $id;

    /**
     * name des Pools
     */
    private $name;

    /**
     * Liste der Projekte in diesem Pool
     */
    private $projects;

    /**
     * Variable welchen den Administrator (Gründer) dieses Pools hält
     */
    private $admin;

    /**
     * Wer alles diesen Pool gejoined hat
     */
    private $members;


    public function __construct($sessionID, $name, $adminName)
    {
        $this->projects = [];
        $this->members = [];
        $this->admin = new Member(ProjectController::getNotUsedID(), $adminName, $sessionID, "Admin");
        $this->name = $name;
    }

    /**
     * Add a new Project to the pool
     */
    public function addProject($project, $tags)
    {
        array_push($this->projects, $project);
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
        return $this->admin;
    }

    /**
     * get the name of the pool
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * analyze the pool and distribute the members
     * to the projects
     */
    public function analyzeProjects()
    {
        // TODO: Implement analyzeProjects() method.
    }

    /**
     * checks wether this project pool has the given ID or not
     */
    public function hasID($id)
    {
        return ($this->getAdmin()->getHashCode() === $id);
    }

    /**
     * @return array
     * Used for TESTING #TODO Remove on relase
     */
    public function getMembers() {
        return $this->members;
    }

    /**
     * register a new member into the pool with the
     * pre-shared key (hashCode) by the admin
     */
    public function registerMember($member, $hashCode)
    {

        if($this->getAdmin()->getHashCode() == $hashCode)
        {
            array_push($this->members, $member);
            return true;
        }

        return false;
    }
}
