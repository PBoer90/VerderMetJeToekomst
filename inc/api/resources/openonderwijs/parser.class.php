<?php

class Api_Resources_OpenOnderwijs_Parser
{
    /**
     * Parses one job to a standard output
     *
     * @param array $job JSON Object with the job
     * @return array Standard array output for the job
     */
    public function parseJob($job)
    {
        $newJob = array();

        if(!isset($job->message))
        {
            $newJob['id'] = 'oo-'.$job->_id;

            $newJob['jobCount'] = '1';

            $newJob['name'] = $job->_source->title;
            $newJob['description'] = $job->_source->fulltxt;
            $newJob['requirements'] = $job->_source->conditions_descr;
            $newJob['otherDetails'] = ''; // ??

            $newJob['employer']['description'] = isset($job->_source->employer_descr) ? $job->_source->employer_descr : '';

            $newJob['organisation']['name'] = $job->_source->organization_name;
            $newJob['organisation']['size'] = $job->_source->org_size;

            $newJob['location']['latitude'] = isset($job->_source->job_location_latitude) ? $job->_source->job_location_latitude : '';
            $newJob['location']['longitude'] = isset($job->_source->job_location_longitude) ? $job->_source->job_location_longitude : '';
            $newJob['location']['city'] = $job->_source->job_location;
            $newJob['location']['postcode'] = $job->_source->job_location_id;

            $newJob['hours']['type'] = $job->_source->working_hours;
            $newJob['hours']['max'] = isset($job->_source->hours_per_week_min) ? $job->_source->hours_per_week_min : '';
            $newJob['hours']['min'] = isset($job->_source->hours_per_week_max) ? $job->_source->hours_per_week_max : '';

            $newJob['experience']['min'] = isset($job->_source->experience_min) ? $job->_source->experience_min : '';
            $newJob['experience']['max'] = isset($job->_source->experience_max) ? $job->_source->experience_max : '';

            $newJob['salary']['max'] = isset($job->_source->salery_min) ? $job->_source->salery_min : '';
            $newJob['salary']['max'] = isset($job->_source->salary_max) ? $job->_source->salary_max : '';

            $newJob['contractType'] = $job->_source->contract_type;

            $newJob['branches'] = array($job->_source->sector);

            $newJob['categories'] = array($job->_source->jobfeed_profession);

            $newJob['educationLevels'] = explode('/', $job->_source->education_level);

        }

        return $newJob;
    }

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
    }
}