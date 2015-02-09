<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'inc/api/api.class.php';

$api = new Api();

$dataDirectory = 'data/';

file_put_contents($dataDirectory.'educations.json', $api->getEducations());
file_put_contents($dataDirectory.'branches.json', $api->getBranches());