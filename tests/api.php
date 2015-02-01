<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../inc/api/api.class.php';

$api = new Api();

//sjon

print_r($api->getBranches());
//print_r($api->getEducations());
//print_r($api->getJobs());
//print_r($api->getJobs(
//    array(
//        'education' => array(
//            'MBO'
//        ),
//        'branch' => array(
//            'ICT'
//        )
//    )
//));
//print_r($api->getJob('cso-01420-267561073562'));
//print_r($api->getJob('oo--6WpnF85SoudvVnDrdqIVQ'));
//print_r($api->getBranches());