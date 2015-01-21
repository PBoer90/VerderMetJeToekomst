<?php

require_once 'resources/cso/cso.class.php';
require_once 'resources/cso/enumeration.class.php';
require_once 'resources/cso/filter.class.php';
require_once 'resources/cso/parser.class.php';

class Api
{
    /**
     * @var array $resources Array with resource objects
     */
    private $resources = array();

    /**
     * Load all the resources we got
     */
    public function __construct()
    {
        $CSO = new Api_Resources_CSO();
        $CSO->authenticate('timojong', 'FG4d%!k3hU');
        $this->addResource('CSO', $CSO);
    }

    /**
     * Gets all information from one job
     *
     * @param string $id The job id
     */
    public function getJob($id)
    {
        $parts = explode('-', $id);
        $resourceIdentifier = array_shift($parts);
        $id = implode('-', $parts);

        switch($resourceIdentifier)
        {
            case 'cso':
                $CSO = $this->getResource('CSO');
                return $CSO->getJob($id);
                break;
        }
    }

    /**
     * Gets the jobs from te resources
     *
     * @param mixed $filter Array with filters
     * @return array Jobs
     */
    public function getJobs($filter = false)
    {
        $jobs = array();

        $CSO = $this->getResource('CSO');
        array_push($jobs, $CSO->getJobs($filter));

        return $jobs;
    }

    /**
     * Gets all the educations we got
     *
     * @return array Educations
     */
    public function getEducations()
    {
        $educations = array();

        $CSO = $this->getResource('CSO');
        $educations = array_merge($educations, $CSO->enumeration->getEducations());

        return $educations;
    }

    public function getRegions()
    {
        $regions = array();

        $CSO = $this->getResource('CSO');
        $regions = array_merge($regions, $CSO->enumeration->getRegions());

        return $regions;
    }

    /**
     * Adds a resource to our resources
     *
     * @param string $name The resource name
     * @param object $resource The resource that we will add to the other resources we have got
     */
    private function addResource($name, $resource)
    {
        $this->resources[$name] = $resource;
    }

    /**
     * Gets a resource
     *
     * @param string $name The resource name
     * @return mixed The resource object
     */
    private function getResource($name)
    {
        if(isset($this->resources[$name]))
        {
            return $this->resources[$name];
        }
    }
}