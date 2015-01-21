<?php

class Api_Resources_CSO_Parser
{
    /**
     * Parses all the jobs to a standard output
     *
     * @param array $jobs JSON Object with all the jobs
     * @return array Standard output for jobs
     *
     * @TODO - Some jobs got empty latitude and longitude
     */
    public function parseJobs($jobs)
    {
        $jobs = $jobs->result;

        $newJobs = array();

        foreach($jobs as $job)
        {
            $newJob = array();

            $newJob['id'] = 'cso-'.$job->code;

            $newJob['jobCount'] = $job->features->featuresDetail->jobCount;

            $newJob['organisation']['name'] = $job->organisation->name;

            $newJob['location']['latitude'] = $job->features->location->latitude;
            $newJob['location']['longitude'] = $job->features->location->longitude;
            $newJob['location']['city'] = $job->features->location->city;
            $newJob['location']['postcode'] = $job->features->location->postcode;

            $newJob['hours']['max'] = $job->features->employmentConditions->hoursMax;
            $newJob['hours']['min'] = $job->features->employmentConditions->hoursMin;

            $newJob['salary']['max'] = $job->features->employmentConditions->salaryMax;
            $newJob['salary']['max'] = $job->features->employmentConditions->salaryMin;

            $newJob['contractType'] = $job->features->employmentConditions->contractType->label;

            $newJob['branches'] = $this->scan($job->features->featuresDetail->jobBranches, 'label');

            $newJob['categories'] = $this->scan($job->features->featuresDetail->jobCategories, 'label');

            $newJob['educationLevels'] = $this->scan($job->features->featuresDetail->educationLevels, 'label');

            array_push($newJobs, $newJob);
        }

        return $newJobs;
    }

    /**
     * Scans and extracts the $field value from the JSON Object, also checks for children
     *
     * @param array $json The JSON object
     * @param string $field The value that we need to extract
     * @return array The $field values
     */
    private function scan($json, $field)
    {
        $return = array();

        if(count($json) > 0)
        {
            foreach($json as $value)
            {
                if(count($value->children) > 0)
                {
                    $return = array_merge($return, $this->scan($value->children, $field));
                }

                if(isset($value->{$field}))
                {
                    array_push($return, $value->{$field});
                }
            }
        }

        return $return;
    }
}