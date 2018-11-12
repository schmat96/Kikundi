<?php

require_once 'interfaces/MemberImpl.php';

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

    public function __construct($id, $name, $sessionId, $role){
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
        return $this->id."KIK".$this->name;
    }

    public function getName()
    {
        return $this->name;
    }
}