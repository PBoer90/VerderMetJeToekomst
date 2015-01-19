<?php

class Api_Resources_CSO_Enumeration
{
    // TODO - add other education
    /**
     * @var array $educations Array with all the educations
     */
    private  $educations = array(
        'hbo' => 'CWD.08',
        'mbo' => 'CWD.12'
    );

    /**
     * Returns the education code for the given education name
     *
     * @param string $name The education name
     * @return string The education code
     */
    public function getEducationCode($name)
    {
        if(isset($this->educations[strtolower($name)]))
        {
            return $this->educations[strtolower($name)];
        }
    }

    /**
     * Returns all the educations we got
     *
     * @return array All the educations we got
     */
    public function getEducations()
    {
        return array_keys($this->educations);
    }
}