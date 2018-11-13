<?php

require_once 'Tag.php';
require_once('interfaces/ProjectImpl.php');

/**
 * Class Project
 * The Project class contains all the information a project can hold.
 */

class Project implements ProjectImpl
{

    private $id;
    private $maxMembers;
    private $minMembers;
    private $difficulty;
    private $name;
    private $description;
    private $tags;
    private $likedMembers;

    public function __construct($maxMembers, $minMembers, $difficulty, $name, $description, $tags) {
        $this->id = md5(uniqid(rand(), true));
        $this->maxMembers = $maxMembers;
        $this->minMembers = $minMembers;
        $this->difficulty = $difficulty;
        $this->name = $name;
        $this->description = $description;
        $this->tags = $tags;
        $this->likedMembers = array();
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTags() {
        return $this->tags;
    }

    public function getLikes() {
        return $this->likedMembers;
    }

    public function changeOrDeleteStatus($member, $status) {
        if ($status===NULL) {
            //#TODO remove member from $this->likedMembers
            echo "removed status by member ".$member->getName()." from project ".$this->getName();
        } else {
            //#TODO update or add status to  $this->likedMembers
            echo "updated status by member ".$member->getName()." from project ".$this->getName()." to new status".$status;
            array_push( $this->likedMembers, $member->getName()."->".$status);
        }
    }

    /**
     * Check if a given tag is listed for the project.
     * @param $tag
     * @return string
     */
    public function containsTag($tag) {
        foreach($this->tags as $value) {
            return $value.equals($tag);
        }
    }

    // https://stackoverflow.com/questions/13980883/how-to-separate-html-from-php-files
}