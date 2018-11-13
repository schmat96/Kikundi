<?php
/**
 * Created by IntelliJ IDEA.
 * User: Mathias
 * Date: 13.11.2018
 * Time: 19:33
 */

class Test {
    /**
     * @var array Holds all Error Messages
     */
    public $errors = array();

    public function __construct() {

    }

    /**
     * @param $string Adds a new Error message to the array provided by the method call
     */
    protected function addError($string) {
        array_push($this->errors,$string);
    }

    public function getName() {
        return get_class($this);
    }

}