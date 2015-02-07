<?php

class Api_Resources_OpenOnderwijs extends Api_Resource_Base
{
    /**
     * @var Api_Resources_OpenOnderwijs_Enumeration $enumeration The Enumeration object
     */
    protected $enumeration;

    /**
     * @var Api_Resources_OpenOnderwijs_Filter $filter The filter object
     */
    protected $filter;

    /**
     * @var Api_Resources_OpenOnderwijs_Parser $parser The parser object
     */
    protected $parser;

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
        $url = $this->getBaseUrl().'job_doc/jobfeed/job/'.$code;

        $result = $this->request($url, array(), false);

        return $this->parser->parseJob($result);
    }

    function getJobs($filter)
    {
        $url = $this->getBaseUrl().'job_search'.$this->filter->create($filter, $this->enumeration);

        $result = $this->request($url, array(), false);

        return $this->parser->parseJobs($result);
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