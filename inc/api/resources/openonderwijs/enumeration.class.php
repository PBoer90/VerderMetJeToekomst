<?php

class Api_Resources_OpenOnderwijs_Enumeration
{
    /**
     * @var array $educations Array with all the educations
     * TODO - GET DATA DYNAMICALLY
     */
    private $educations = array(
        'HBO',
        'MBO',
    );

    /**
     * @var array $branches Array with all the branches
     * TODO - GET DATA DYNAMICALLY
     */
    private $branches = array(
        'Onderwijs / Onderzoek',
        'Arbeidsbemiddeling',
        'Gezondheidszorg / Welzijn',
        'Handel',
        'Zakelijke dienstverlening',
        'Overig / Onbekend'
    );

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
     * Returns all the educations we got
     *
     * @return array Educations
     */
    public function getEducations()
    {
        return $this->educations;
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
     * Returns all the branches we got
     *
     * @return array Branches
     */
    public function getBranches()
    {
        return $this->branches;
    }
}