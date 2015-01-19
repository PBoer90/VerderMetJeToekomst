<?php

class CSO
{
    private $username = '';
    private $password = '';

    private $key = '';

    private $baseUrl = 'https://sandbox.api.cso20.net/v1/JobAPI/';


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

        return $this->request($url, $post);
    }

    /**
     * List of all the jobs
     *
     * @param string|array [optional] $education The education code(s) to search for
     * @param string|array [optional] $region The region code(s) to search for
     * @return array JSON object
     */
    public function getJobs($education = null, $region = null)
    {
        $url = $this->getBaseUrl().'getJobs.json';

        $remoteJobFilter = array(
            '__type__' => 'RemoteJobFilter',
            'featuresFilter' => array(
                '__type__' => 'RemoteJobFeaturesFilter',
                'detailFilter' => array(
                    '__type__' => 'RemoteJobDetailFilter',
                    'educationLevels' => array(),
                    'regions' => array()
                )
            )
        );

        if($education !== null)
        {
            if(is_array($education))
            {
                foreach($education as $value)
                {
                    $remoteJobFilter['featuresFilter']['detailFilter']['educationLevels'][] = array(
                        '__type__' => 'EducationLevel',
                        'code' => $value
                    );
                }
            }

            if(is_string($education))
            {
                $remoteJobFilter['featuresFilter']['detailFilter']['educationLevels'][] = array(
                    '__type__' => 'EducationLevel',
                    'code' => $education
                );
            }
        }

        if($region !== null)
        {
            if(is_array($region))
            {
                foreach($region as $value)
                {
                    $remoteJobFilter['featuresFilter']['detailFilter']['regions'][] = array(
                        '__type__' => 'Region',
                        'code' => $value
                    );
                }
            }

            if(is_string($region))
            {
                $remoteJobFilter['featuresFilter']['detailFilter']['regions'][] = array(
                    '__type__' => 'Region',
                    'code' => $region
                );
            }
        }

        $post = array(
            'apiKey' => $this->getKey(),
            'filter' => $remoteJobFilter,
            'fieldSelection' => array(
                '__type__' => 'RemoteJobFieldselection',
                'jobFeatures' => array(
                    '__type__' => 'RemoteJobFeaturesFieldSelection',
                    'location' => true
                ),
            )
        );

        return $this->request($url, $post);
    }

    /**
     * Extracts data for the enumeration type that is provided
     *
     * @param string $enumerationType EducationLevel|JobBranch|JobCategory|ContractType|Region
     * @return array JSON Object
     */
    public function getJobCountForEnumeration($enumerationType)
    {
        $url = $this->getBaseUrl().'getJobCountForEnumeration.json';

        $post = array(
            'apiKey' => $this->getKey(),
            'enumerationType' => $enumerationType,
            'filter' => array(
                '__type__' => 'RemoteJobFilter'
            )
        );

        return $this->request($url, $post);
    }

    /**
     * Executes a curl request with the provided data
     *
     * @param string $url
     * @param array $post
     * @return array JSON OBJECT
     */
    private function request($url, $post)
    {
        // open connection
        $ch = curl_init();

        // the right header
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        // url
        curl_setopt($ch,CURLOPT_URL, $url);
        // number of  POST vars
        curl_setopt($ch,CURLOPT_POST, 1);
        // POST data
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($post));
        // prevent raw output
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        // get the result
        $result = curl_exec($ch);

        // close connection
        curl_close($ch);

        $result = json_decode($result);

        return $result;
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