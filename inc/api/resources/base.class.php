<?php

abstract class Api_Resource_Base
{
    abstract function getJob($code);
    abstract function getJobs($filter);

    /**
     * Executes a curl request with the provided data
     *
     * @param string $url
     * @param array [optional] $post
     * @param bool [optional] $headers
     * @return array JSON OBJECT
     */
    public function request($url, $post = array(), $headers = true)
    {
        // open connection
        $ch = curl_init();

        if($headers == true)
        {
            // the right header
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
            ));
        }

        // url
        curl_setopt($ch,CURLOPT_URL, $url);

        if(!empty($post))
        {
            // number of  POST vars
            curl_setopt($ch,CURLOPT_POST, 1);
            // POST data
            curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($post));
        }

        // prevent raw output
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        // get the result
        $result = curl_exec($ch);

        // close connection
        curl_close($ch);

        $result = json_decode($result);

        return $result;
    }

    /**
     * Returns all the educations we got
     *
     * @return array Educations
     */
    public function getEducations()
    {
        return $this->enumeration->getEducations();
    }

    /**
     * Returns all the branches we got
     *
     * @return array Branches
     */
    public function getBranches()
    {
        return $this->enumeration->getBranches();
    }
}