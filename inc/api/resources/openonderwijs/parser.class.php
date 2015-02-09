<?php

class Api_Resources_OpenOnderwijs_Parser
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

        if(isset($jobs->hits))
        {
            foreach($jobs->hits->hits as $job)
            {
                $newJob['id'] = 'oo-'.$job->_id;

                $newJob['jobCount'] = '1';

                $newJob['name'] = isset($job->_source->title) ? $job->_source->title : '';
                $newJob['description'] = isset($job->_source->fulltxt) ? $job->_source->fulltxt : '';
                $newJob['requirements'] = isset($job->_source->conditions_descr) ? $job->_source->conditions_descr : '';
                $newJob['otherDetails'] = ''; // ??

                $newJob['employer']['description'] = isset($job->_source->employer_descr) ? $job->_source->employer_descr : '';

                $newJob['organisation']['name'] = isset($job->_source->organization_name) ? $job->_source->organization_name : '';
                $newJob['organisation']['size'] = isset($job->_source->org_size) ? $job->_source->org_size : '';

                $newJob['location']['latitude'] = isset($job->_source->job_location_latitude) ? $job->_source->job_location_latitude : '';
                $newJob['location']['longitude'] = isset($job->_source->job_location_longitude) ? $job->_source->job_location_longitude : '';
                $newJob['location']['city'] = isset($job->_source->job_location) ? $job->_source->job_location : '';
                $newJob['location']['postcode'] = isset($job->_source->job_location_id) ? $job->_source->job_location_id : '';

                $newJob['hours']['type'] = isset($job->_source->working_hours) ? $job->_source->working_hours : '';
                $newJob['hours']['max'] = isset($job->_source->hours_per_week_min) ? $job->_source->hours_per_week_min : '';
                $newJob['hours']['min'] = isset($job->_source->hours_per_week_max) ? $job->_source->hours_per_week_max : '';

                $newJob['experience']['min'] = isset($job->_source->experience_min) ? $job->_source->experience_min : '';
                $newJob['experience']['max'] = isset($job->_source->experience_max) ? $job->_source->experience_max : '';

                $newJob['salary']['max'] = isset($job->_source->salery_min) ? $job->_source->salery_min : '';
                $newJob['salary']['max'] = isset($job->_source->salary_max) ? $job->_source->salary_max : '';

                $newJob['contractType'] = isset($job->_source->contract_type) ? $job->_source->contract_type : '';

                $newJob['branches'] = isset($job->_source->sector) ? array($job->_source->sector) : array();

                $newJob['categories'] = isset($job->_source->jobfeed_profession) ? array($job->_source->jobfeed_profession) : array();

                $newJob['educationLevels'] = isset($job->_source->education_level) ? explode('/', $job->_source->education_level) : array();

                array_push($newJobs, $newJob);
            }
        }

        return $newJobs;
    }
}