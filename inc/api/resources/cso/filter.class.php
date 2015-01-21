<?php

class Api_Resources_CSO_Filter
{
    /**
     * @var Api_Resources_CSO_Enumeration $enumeration The Enumeration object
     */
    public $enumeration;

    /**
     * Creates the filter array
     *
     * @param array $filter Options we want to filter
     * @param Api_Resources_CSO_Enumeration $enumeration The Enumeration object
     * @return array
     */
    public function create($filter, $enumeration)
    {
        $this->enumeration = $enumeration;

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
                    $this->createEducationFilter($_filter, $value);
                }
            }

            if(is_string($education))
            {
                $educationCode = $this->enumeration->getEducationCode($education);

                if($educationCode != false)
                {
                    $_filter['featuresFilter']['detailFilter']['educationLevels'][] = array(
                        '__type__' => 'EducationLevel',
                        'code' => $educationCode
                    );
                }
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
                    $this->createRegionFilter($_filter, $value);
                }
            }

            if(is_string($region))
            {
                $regionCode = $this->enumeration->getRegionCode($region);

                if($regionCode != false)
                {
                    $_filter['featuresFilter']['detailFilter']['regions'][] = array(
                        '__type__' => 'Region',
                        'code' => $regionCode
                    );
                }
            }
        }
    }
}