<?php

error_reporting(E_ALL, 1);

require_once '../inc/cso.class.php';

$CSO = new CSO();

$CSO->authenticate('timojong', 'FG4d%!k3hU');

//$CSO->getJob('01535-852805227853');

$CSO->getJobs();