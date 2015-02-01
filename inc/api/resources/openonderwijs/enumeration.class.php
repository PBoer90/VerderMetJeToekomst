<?php

class Api_Resources_OpenOnderwijs_Enumeration
{
    /**
     * @var array $educations Array with all the educations
     */
    private $educations = array(
        'wo_post',
        'wo',
        'hbo',
        'mbo',
        'vmbo'
    );

    private $branches = array(
        'Onderwijs / Onderzoek',
        'Arbeidsbemiddeling',
        'Gezondheidszorg / Welzijn',
        'Handel',
        'Zakelijke dienstverlening',
        'Overig / Onbekend'
    );

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
     * Returns all the branches we got
     *
     * @return array Branches
     */
    public function getBranches()
    {
        return $this->branches;
    }
}