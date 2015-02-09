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
     * @var string $cacheJobs The jobs
     */
    private $cacheJobs = false;

    /**
     * Initializes the enumeration and filter object
     */
    public function __construct()
    {
        $this->enumeration = new Api_Resources_OpenOnderwijs_Enumeration();
        $this->filter = new Api_Resources_OpenOnderwijs_Filter();
        $this->parser = new Api_Resources_OpenOnderwijs_Parser();
    }

    /**
     * Extracts data for the provided job code
     *
     * @param string $code The job code
     * @return array JSON Object
     */
    function getJob($code)
    {
        $url = $this->getBaseUrl().'job_doc/jobfeed/job/'.$code;

        $result = $this->request($url, array(), false);

        return $this->parser->parseJob($result);
    }

    /**
     * List of all the jobs
     *
     * @param mixed $filter An array with filters
     * @return array JSON object
     */
    function getJobs($filter)
    {
        $this->generateEnumeration('educations', 'branches');

        $filter = $this->filter->create($filter, $this->enumeration);

        if($this->filter->failed == false)
        {
            $url = $this->getBaseUrl().'job_search'.$filter;
            $result = $this->request($url, array(), false);

            return $this->parser->parseJobs($result);
        }

        return array();
    }

    /**
     * Generates the provided enumeration(s)
     *
     * @param array|bool $filter $filter The filter
     */
    protected function generateEnumeration($filter = false)
    {
        if($this->enumeration->hasEducations() === false &&
            $this->enumeration->hasBranches() === false)
        {
            $_educations = array();
            $_branches = array();

            // we can only filter the enumeration from the jobs
            $result = $this->request($this->getBaseUrl().'job_search', array(), false);

            if(isset($result->hits))
            {
                foreach($result->hits->hits as $job)
                {
                    $_educations = array_merge($_educations, explode('/', $job->_source->education_level));
                    $_branches = array_merge($_branches, array($job->_source->sector));
                }
            }

            $_educations = array_unique($_educations);
            $_branches = array_unique($_branches);

            $this->enumeration->setEducations($_educations);
            $this->enumeration->setBranches($_branches);
        }
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