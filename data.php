<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'inc/api/api.class.php';

$api = new Api();

$dataDirectory = 'data/';
$cacheTime = 200;

$filename = $dataDirectory.md5($_SERVER['REQUEST_URI']).'.json';

if(((is_file($filename)) && ((filemtime($filename) + $cacheTime) < time())) || !is_file($filename))
{
    // generate
    $params = explode('&', $_SERVER['QUERY_STRING']);

    $filter = array();

    if(count($params) > 0)
    {
        foreach($params as $param)
        {
            list($key, $value) = explode('=', $param);

            $filter[$key] = explode(',', $value);
        }
    }

    $data = $api->getJobs($filter);

    file_put_contents($filename, $data);

    unset($data);
}

echo file_get_contents($filename);