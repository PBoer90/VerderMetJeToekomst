<?php

class Api_Resources_CSO extends Api_Resource_Base
{
    /**
     * @var Api_Resources_CSO_Enumeration $enumeration The Enumeration object
     */
    protected $enumeration;

    /**
     * @var Api_Resources_CSO_Filter $filter The filter object
     */
    protected $filter;

    /**
     * @var Api_Resources_CSO_Parser $parser The parser object
     */
    protected $parser;

    /**
     * @var string $username The Api user name
     */
    private $username = '';

    /**
     * @var string $password The Api user password
     */
    private $password = '';

    /**
     * @var string $key The Api key that we use for api request
     */
    private $key = '';

    /**
     * @var string $baseUrl The base url for the Api
     */
    private $baseUrl = 'https://sandbox.api.cso20.net/v1/JobAPI/';


    /**
     * Initializes the enumeration and filter object
     */
    public function __construct()
    {
        $this->enumeration = new Api_Resources_CSO_Enumeration();
        $this->filter = new Api_Resources_CSO_Filter();
        $this->parser = new Api_Resources_CSO_Parser();
    }

    /**
     * Authenticates with the server, the server will then provided us with an Api Key
     * After we got the Api Key we will check if the Api Key is valid just in case
     *
     * @param string $username The user name for the Api authentication
     * @param string $password The user password for the Api authentication
     */
    public function authenticate($username, $password)
    {
        $this->setUsername($username);
        $this->setPassword($password);

        // get a token
        $url = $this->getBaseUrl().'getApiKey.json';
        $post = array(
            'username' => $this->getUsername(),
            'password' => $this->getPassword()
        );

        $result = $this->request($url, $post);

        if(isset($result->result))
        {
            $this->setKey($result->result);
        }
        else
        {
            die('Invalid credentials');
        }

        // check the api key
        $this->validateApiKey();
    }

    /**
     * Checks if the Api Key is still valid
     */
    private function validateApiKey()
    {
        $url = $this->getBaseUrl().'isValidApiKey.json';

        $post = array(
            'apiKey' => $this->getKey()
        );

        $result = $this->request($url, $post);

        // check if we got true as result
        if(!isset($result->result) && $result->result == 1)
        {
            die('API KEY is invalid');
        }
    }

    /**
     * Extracts data for the provided job code
     *
     * @param string $code The job code
     * @return array JSON Object
     */
    public function getJob($code)
    {
        $url = $this->getBaseUrl().'getJob.json';

        // We want to see every field
        // TODO - make it customizable
        $jobFieldSelection = array(
            '__type__' => 'RemoteJobFieldselection',
            'jobContent' => array(
                '__type__' => 'RemoteJobContentFieldSelection',
                'department' => true,
                'employer' => true
            ),
            'jobExtraFields' => true,
            'jobFeatures' => array(
                '__type__' => 'RemoteJobFeaturesFieldSelection',
                'applicationContact' => true,
                'applicationProcedureContact' => true,
                'applicationTypes' => true,
                'detail' => true,
                'employmentConditions' => true,
                'informationContact' => true,
                'location' => true,
                'onlineJobApplicationTypes' => true,
                'tvDistinction' => true
            ),
            'jobPublication' => array(
                '__type__' => 'RemoteJobPublicationDataFieldSelection',
                'publicationSets' => true
            ),
            'organisation' => true
        );

        $post = array(
            'apiKey' => $this->getKey(),
            'jobCode' => $code,
            'remoteJobFieldSelection' => $jobFieldSelection
        );

        return $this->parser->parseJob($this->request($url, $post));
    }

    /**
     * List of all the jobs
     *
     * @param mixed $filter An array with filters
     * @return array JSON object
     */
    public function getJobs($filter)
    {
        $this->generateEnumeration('educations', 'branches');

        $url = $this->getBaseUrl().'getJobs.json';

        $remoteJobFilter = $this->filter->create($filter, $this->enumeration);

        $post = array(
            'apiKey' => $this->getKey(),
            'filter' => $remoteJobFilter,
            'fieldSelection' => array(
                '__type__' => 'RemoteJobFieldselection',
                'jobFeatures' => array(
                    '__type__' => 'RemoteJobFeaturesFieldSelection',
                    'detail' => true,
                    'employmentConditions' => true,
                    'location' => true,
                ),
                'organisation' => true
            )
        );

        return $this->parser->parseJobs($this->request($url, $post));
    }

    /**
     * Generates the provided enumeration(s)
     */
    protected function generateEnumeration()
    {
        $indicators = func_get_args();

        foreach($indicators as $indicator)
        {
            switch($indicator)
            {
                case 'educations':
                    $this->enumeration->setEducations($this->getJobCountForEnumeration('EducationLevel'));
                    break;

                case 'branches':
                    $this->enumeration->setBranches($this->getJobCountForEnumeration('JobBranch'));
                    break;
            }
        }
    }

    /**
     * Extracts data for the enumeration type that is provided
     *
     * @param string $enumerationType EducationLevel|JobBranch|JobCategory|ContractType|Region
     * @return array JSON Object
     */
    private function getJobCountForEnumeration($enumerationType)
    {
        $url = $this->getBaseUrl().'getJobCountForEnumeration.json';

        $post = array(
            'apiKey' => $this->getKey(),
            'enumerationType' => $enumerationType,
            'filter' => array(
                '__type__' => 'RemoteJobFilter'
            )

        );

        return $this->parser->parseEnumeration($this->request($url, $post));
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
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