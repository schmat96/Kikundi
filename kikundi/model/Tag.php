<?php

/**
 * Class Tag to describe Projects
 */
class Tag {

    private $id;
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
        $this->id = ProjectController::getNotUsedTagID();
    }

    public function getName() {
        return $this->name;
    }

    /**
     * compare equality of a provided tag
     */
    public function equals($tag) {
        return $tag->getName() === $this->getName();
    }
}