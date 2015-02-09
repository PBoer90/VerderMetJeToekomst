<?php

class Api_Resources_OpenOnderwijs_Filter
{
    /**
     * @var Api_Resources_OpenOnderwijs_Enumeration $enumeration The Enumeration object
     */
    public $enumeration;

    /**
     * @var bool $failed If false then the filter failed while creating
     */
    public $failed =  false;

    /**
     * Creates the filter array
     *
     * @param array $filter Options we want to filter
     * @param Api_Resources_OpenOnderwijs_Enumeration $enumeration The Enumeration object
     * @return string The filter string
     */
    public function create($filter, $enumeration)
    {
        $this->enumeration = $enumeration;

        $_filter = array();

        // loop through each filter and call dynamic function
        if($filter !== false)
        {
            foreach($filter as $key => $value)
            {
                $function = 'create'.ucfirst(strtolower($key)).'Filter';

                if(method_exists($this, $function))
                {
                    $this->{$function}($_filter, $value);
                }
            }
        }

        return '?'.implode('&amp;', $_filter);
    }

    /**
     * Creates education filter part
     *
     * @param array $_filter The filter array
     * @param array|string $education The education(s)
     */
    public function createEducationFilter(&$_filter, $education)
    {
        $educations = $this->enumeration->getEducations();

        if($education !== null)
        {
            if(is_array($education))
            {
                foreach($education as $_education)
                {
                    if(!in_array($_education, $educations))
                    {
                        $this->failed = true;
                    }
                }

                array_push($_filter, 'education_levels='.implode(',', $education));
            }

            if(is_string($education))
            {
                if(!in_array($education, $educations))
                {
                    $this->failed = true;
                }
                array_push($_filter, 'education_levels='.$education);
            }
        }
    }

    /**
     * Creates branch filter part
     *
     * @param array $_filter The filter array
     * @param array|string $branch The branch(es)
     */
    public function createBranchFilter(&$_filter, $branch)
    {
        $branches = $this->enumeration->getBranches();

        if($branch !== null)
        {
            if(is_array($branch))
            {
                foreach($branch as $_branch)
                {
                    if(!in_array($_branch, $branches))
                    {
                        $this->failed = true;
                    }
                }

                array_push($_filter, 'sector='.implode(',', $branch));
            }

            if(is_string($branch))
            {
                if(!in_array($branch, $branches))
                {
                    $this->failed = true;
                }

                array_push($_filter, 'sector='.$branch);
            }
        }
    }
}