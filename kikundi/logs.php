<?php


/**
* created by Mathias Schmid
* created: 12.11.2018
*/


require_once 'controller/logger/LoggerService.php';

var_dump(LoggerService::getLogs());
LoggerService::log("test");
var_dump(LoggerService::getLogs());

?>
