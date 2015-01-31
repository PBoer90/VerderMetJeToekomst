<?php

class Api_Resources_CSO_Enumeration
{
    // TODO - add other education
    /**
     * @var array $educations Array with all the educations
     */
    private $educations = array(
        'hbo' => 'CWD.08',
        'mbo' => 'CWD.12'
    );

    /**
     * @var array $regions Array with all the regions
     */
    private $regions = array(
        'gelderland' => 'BRG.0210',
        'flevoland' => 'BRG.0212',
        'utrecht' => 'BRG.0214',
        'noord-holland' => 'BRG.0216',
        'zuid-holland' => 'BRG.0218',
        'zeeland' => 'BRG.0220',
        'noord-brabant' => 'BRG.0222',
        'caribisch nederland' => 'BRG.0226'
    );

    /**
     * Returns the education code for the given education name
     *
     * @param string $name The education name
     * @return mixed The education code, if we can find the matching education else false
     */
    public function getEducationCode($name)
    {
        if(isset($this->educations[strtolower($name)]))
        {
            return $this->educations[strtolower($name)];
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
     * Returns the region code for the given region name
     *
     * @param string $name The region name
     * @return mixed The region code, if we can find the matching region else false
     */
    public function getRegionCode($name)
    {
        if(isset($this->regions[strtolower($name)]))
        {
            return $this->regions[strtolower($name)];
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
     *
     * @TODO - Nicer code ?
     */
    public function getRegions()
    {
        $regions = array_keys($this->regions);

        foreach($regions as &$value)
        {
            $value = ucwords(implode('-', array_map('ucfirst', explode('-', $value))));
        }

        return $regions;
    }
}