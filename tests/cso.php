<?php

error_reporting(E_ALL, 1);

require_once '../inc/cso.class.php';

$CSO = new CSO();

$CSO->authenticate('timojong', 'FG4d%!k3hU');

print_r($CSO->getJobCountForEnumeration('Region'));

//print_r($CSO->getJob('01310-489407'));

//print_r($CSO->searchJobs('CWD.0806'));

//print_r($CSO->getJobs());