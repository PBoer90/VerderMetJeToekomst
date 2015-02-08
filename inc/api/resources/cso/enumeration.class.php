<?php

class Api_Resources_CSO_Enumeration extends Api_Resource_Enumeration_Base
{
    /**
     * @var array $educations Array with all the educations
     */
    private $educations = array();

    /**
     * @var array $regions Array with all the regions
     * TODO - GET DATA DYNAMICALLY
     */
    private $regions = array(
        'Gelderland' => 'BRG.0210',
        'Flevoland' => 'BRG.0212',
        'Utrecht' => 'BRG.0214',
        'Noord-Holland' => 'BRG.0216',
        'Zuid-Holland' => 'BRG.0218',
        'Zeeland' => 'BRG.0220',
        'Noord-Brabant' => 'BRG.0222',
        'Caribisch Nederland' => 'BRG.0226'
    );

    /**
     * @var array $branches Array with all the branches
     */
    private $branches = array();

    /**
     * Sets the educations
     *
     * @param array $educations The educations
     */
    public function setEducations($educations)
    {
        $this->educations = $educations;
    }

    /**
     * Returns true if we have educations
     *
     * @return bool True when we got educations else false
     */
    public function hasEducations()
    {
        return count($this->educations) > 0 ? true : false;
    }

    /**
     * Returns the education code for the given education name
     *
     * @param string $name The education name
     * @return mixed The education code, if we can find the matching education else false
     */
    public function getEducationCode($name)
    {
        if(isset($this->educations[$name]))
        {
            return $this->educations[$name];
        }
        else
        {
            return false;
        }
    }

    /**
     * Returns all the educations we got
     *
     * @return array Educations
     */
    public function getEducations()
    {
        return array_keys($this->educations);
    }

    /**
     * Sets the branches
     *
     * @param array $branches The branches
     */
    public function setBranches($branches)
    {
        $this->branches = $branches;
    }

    /**
     * Returns true if we have branches
     *
     * @return bool True when we got branches else false
     */
    public function hasBranches()
    {
        return count($this->branches) > 0 ? true : false;
    }

    /**
     * Returns the branch code for the given branch name
     *
     * @param string $name The branch name
     * @return mixed The branch code, if we can find the matching branch else false
     */
    public function getBranchCode($name)
    {
        if(isset($this->branches[$name]))
        {
            return $this->branches[$name];
        }
        else
        {
            return false;
        }
    }

    /**
     * Returns all the branches we got
     *
     * @return array Branches
     */
    public function getBranches()
    {
        return array_keys($this->branches);
    }

    /**
     * Returns the region code for the given region name
     *
     * @param string $name The region name
     * @return mixed The region code, if we can find the matching region else false
     */
    public function getRegionCode($name)
    {
        if(isset($this->regions[$name]))
        {
            return $this->regions[$name];
        }
        else
        {
            return false;
        }
    }

    /**
     * Returns all the regions we got
     *
     * @return array Regions
     */
    public function getRegions()
    {
        $regions = array_keys($this->regions);

        return $regions;
    }
}