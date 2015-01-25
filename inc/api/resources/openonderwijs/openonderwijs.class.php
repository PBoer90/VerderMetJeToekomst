<?php

class Api_Resources_OpenOnderwijs extends Api_Resource_Base
{
    /**
     * @var Api_Resources_OpenOnderwijs_Enumeration $enumeration The Enumeration object
     */
    public $enumeration;

    /**
     * @var Api_Resources_OpenOnderwijs_Filter $filter The filter object
     */
    private $filter;

    /**
     * @var Api_Resources_OpenOnderwijs_Parser $parser The parser object
     */
    private $parser;

    /**
     * @var string $baseUrl The base url for the Api
     */
    private $baseUrl = 'http://api.openonderwijsdata.nl/api/v2/';

    /**
     * Initializes the enumeration and filter object
     */
    public function __construct()
    {
        $this->enumeration = new Api_Resources_OpenOnderwijs_Enumeration();
        $this->filter = new Api_Resources_OpenOnderwijs_Filter();
        $this->parser = new Api_Resources_OpenOnderwijs_Parser();
    }

    function getJob($code)
    {
        // TODO: Implement getJob() method.
    }

    function getJobs($filter)
    {
        // TODO: Implement getJobs() method.
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }
}