<?php

/**
* created by Matthias Ramseier
* created: 05.11.2018
*/

require_once 'interfaces/MemberImpl.php';

/**
 * Class Member für die Repräsentation eines Mitglieds
 * @author ramsi 05.11.18
 *
 */
class Member implements MemberImpl{

    /**
     * id welche individuell für jeden Member ist
     */
    private $id;

    /**
     * name des Members für Anzeigen, etc.
     */
    private $name;

    /**
     * die SessionID des Members
     */
    private $sessionId;

    /**
     * Die Rolle des Members, welche mit Berechtigungen ausgestattet werden kann
     * momentan nur admin und user vorhanden
     */
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
