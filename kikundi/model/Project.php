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

    public function __construct($maxMembers, $minMembers, $difficulty, $name, $description, $tags) {
        $this->id = md5(uniqid(rand(), true));
        $this->maxMembers = $maxMembers;
        $this->minMembers = $minMembers;
        $this->difficulty = $difficulty;
        $this->name = $name;
        $this->description = $description;
        $this->tags = $tags;
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