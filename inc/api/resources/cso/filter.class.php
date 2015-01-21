<?php

class Api_Resources_CSO_Filter
{
    /**
     * Creates the filter array
     *
     * @param array $filter Options we want to filter
     * @return array
     */
    public function create($filter)
    {
        $_filter = array(
            '__type__' => 'RemoteJobFilter',
            'featuresFilter' => array(
                '__type__' => 'RemoteJobFeaturesFilter',
                'detailFilter' => array(
                    '__type__' => 'RemoteJobDetailFilter'
                )
            )
        );

        // loop through each filter and call dynamic function
        foreach($filter as $key => $value)
        {
            $function = 'create'.ucfirst(strtolower($key)).'Filter';

            if(method_exists($this, $function))
            {
                $this->{$function}($_filter, $value);
            }
        }

        return $_filter;
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
                foreach($education as $value)
                {
                    $_filter['featuresFilter']['detailFilter']['educationLevels'][] = array(
                        '__type__' => 'EducationLevel',
                        'code' => $value
                    );
                }
            }

            if(is_string($education))
            {
                $education['featuresFilter']['detailFilter']['educationLevels'][] = array(
                    '__type__' => 'EducationLevel',
                    'code' => $education
                );
            }
        }
    }

    /**
     * Creates regions filter part
     *
     * @param array $_filter The filter array
     * @param array|string $region The region(s)
     */
    public function createRegionFilter(&$_filter, $region)
    {
        if($region !== null)
        {
            if(is_array($region))
            {
                foreach($region as $value)
                {
                    $_filter['featuresFilter']['detailFilter']['regions'][] = array(
                        '__type__' => 'Region',
                        'code' => $value
                    );
                }
            }

            if(is_string($region))
            {
                $_filter['featuresFilter']['detailFilter']['regions'][] = array(
                    '__type__' => 'Region',
                    'code' => $region
                );
            }
        }
    }
}