<?php

class Api_Resources_CSO_Parser
{
    /**
     * Parses all the jobs to a standard output
     *
     * @param array $jobs JSON Object with all the jobs
     * @return array Standard array output for jobs
     *
     * @TODO - Some jobs got empty latitude and longitude
     */
    public function parseJobs($jobs)
    {
        $newJobs = array();

        if(isset($jobs->result))
        {
            $jobs = $jobs->result;

            foreach($jobs as $job)
            {
                if(!isset($job->features->location->latitude))
                {
                    continue;
                }

                $newJob['id'] = 'cso-'.$job->code;

                $newJob['jobCount'] = $job->features->featuresDetail->jobCount;

                $newJob['name'] = $job->content->name;
//                $newJob['description'] = $job->content->description;
//                $newJob['requirements'] = $job->content->requirements;
//                $newJob['otherDetails'] = $job->content->otherDetails;

//                $newJob['employer']['description'] = $job->content->employer->description;

                $newJob['organisation']['name'] = $job->organisation->name;
                $newJob['organisation']['size'] = '';

                $newJob['location']['latitude'] = $job->features->location->latitude;
                $newJob['location']['longitude'] = $job->features->location->longitude;
                $newJob['location']['city'] = $job->features->location->city;
                $newJob['location']['postcode'] = $job->features->location->postcode;

                $newJob['hours']['type'] = '';
                $newJob['hours']['max'] = $job->features->employmentConditions->hoursMax;
                $newJob['hours']['min'] = $job->features->employmentConditions->hoursMin;

                $newJob['experience']['min'] = '';
                $newJob['experience']['max'] = '';

                $newJob['salary']['max'] = $job->features->employmentConditions->salaryMax;
                $newJob['salary']['max'] = $job->features->employmentConditions->salaryMin;

                $newJob['contractType'] = isset($job->features->employmentConditions->contractType->label) ? $job->features->employmentConditions->contractType->label : '';

                $newJob['branches'] = $this->scan($job->features->featuresDetail->jobBranches, 'label');

                $newJob['categories'] = $this->scan($job->features->featuresDetail->jobCategories, 'label');

                $newJob['educationLevels'] = $this->scan($job->features->featuresDetail->educationLevels, 'label');

                array_push($newJobs, $newJob);
            }
        }

        return $newJobs;
    }

    /**
     * Parses the given enumeration
     *
     * @param array $enumeration The enumeration array
     * @return array The parsed enumeration
     */
    public function parseEnumeration($enumeration)
    {
        $_enumeration = array();
        $enumeration = $enumeration->result;

        foreach($enumeration as $value)
        {
            $_enumeration = array_merge($_enumeration, $this->scan(array($value->enumeration), 'label', 'code'));
        }

        return $_enumeration;
    }

    /**
     * Scans and extracts the $field value from the JSON Object, also checks for children
     *
     * @param array $json The JSON object
     * @param string $field The value that we need to extract
     * @param string|bool $key [optional] The key for the returning array
     * @return array The $field values
     */
    private function scan($json, $field, $key=false)
    {
        $return = array();

        if(count($json) > 0)
        {
            foreach($json as $value)
            {
                if(count($value->children) > 0)
                {
                    $return = array_merge($return, $this->scan($value->children, $field, $key));
                }

                if(isset($value->{$field}))
                {
                    if($key === false)
                    {
                        array_push($return, $value->{$field});
                    }
                    else
                    {
                        $return[$value->{$field}] = $value->{$key};
                    }
                }
            }
        }

        return $return;
    }
}