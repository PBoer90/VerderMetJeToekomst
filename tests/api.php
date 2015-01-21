<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../inc/api/api.class.php';

$api = new Api();


//print_r($api->getRegions());
//print_r($api->getEducations());
//print_r($api->getJobs());
//print_r($api->getJobs(array('region' => array('BRG.0212'))));
print_r($api->getJob('cso-01420-542618321542'));