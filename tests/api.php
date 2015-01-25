<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../inc/api/api.class.php';

$api = new Api();

//print_r($api->getRegions());
//print_r($api->getEducations());
//print_r($api->getJobs());
print_r($api->getJobs(
    array(
        'education' => array(
            'mbo',
            'hbo'
        )
    )
));
//print_r($api->getJob('cso-01420-267561073562'));
//print_r($api->getJob('oo--6WpnF85SoudvVnDrdqIVQ'));