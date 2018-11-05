<?php

/**
 * Class Member
 * @author ramsi 05.11.18
 *
 */
class Member implements MemberImpl{

    private $id;
    private $name;
    private $sessionId;
    private $role;

    public function _construct($id, $name, $sessionId, $role){
        $this->id = $id;
        $this->name = $name;
        $this->sessionId = $sessionId;
        $this->role = $role;

    }

    /**
     * returns a hash (for Admins) as a string
     */
    public function getHashCode()
    {
        // TODO: Implement getHashCode() method.
    }

    public function getName()
    {
        // TODO: Implement getName() method.
    }
}