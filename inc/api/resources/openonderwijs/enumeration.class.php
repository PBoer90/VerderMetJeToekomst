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

    /**
     * Returns all the educations we got
     *
     * @return array Educations
     */
    public function getEducations()
    {
        return $this->educations;
    }
}