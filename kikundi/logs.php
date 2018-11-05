<?php

require_once 'controller/logger/LoggerService.php';

var_dump(LoggerService::getLogs());
LoggerService::log("test");
var_dump(LoggerService::getLogs());

?>