<?php

class Project
{

    private $id;
    private $maxMembers;
    private $minMembers;
    private $difficulty;
    private $name;
    private $description;
    private $tags;

    public function __construct($maxMembers, $minMembers, $difficulty, $name, $description, $tags) {
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
}