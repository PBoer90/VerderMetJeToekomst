<?php

class Api_Resources_OpenOnderwijs_Filter
{
    /**
     * @var Api_Resources_OpenOnderwijs_Enumeration $enumeration The Enumeration object
     */
    public $enumeration;

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

        return '?'.implode('&', $_filter);
    }

    /**
     * Creates education filter part
     *
     * @param array $_filter The filter array
     * @param array|string $education The education(s)
     */
    public function createEducationFilter(&$_filter, $education)
    {
        if($education !== null)
        {
            if(is_array($education))
            {
                array_push($_filter, 'education_levels='.implode(',', $education));
            }

            if(is_string($education))
            {
                array_push($_filter, 'education_levels='.$education);
            }
        }
    }
}