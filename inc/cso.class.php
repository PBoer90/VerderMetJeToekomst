<?php

class CSO
{
    private $username = '';
    private $password = '';

    private $token = '';

    private $baseUrl = 'https://sandbox.api.cso20.net/v1/JobAPI/';


    /**
     * Authenticates with the server, the server will then provided us with an Api Key
     * After we got the Api Key we will check if the Api Key is valid just in case
     *
     * @param string $username The user name for the Api authentication
     * @param string $password The user password for the Api authentication
     */
    public function authenticate($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        // get a token
        $url = $this->baseUrl.'getApiKey.json';
        $post = array(
            'username' => $this->username,
            'password' => $this->password
        );

        $result = $this->request($url, $post);

        if(isset($result->result))
        {
            $this->token = $result->result;
        }
        else
        {
            die('Invalid credentials');
        }

        // check the api key
        $this->validateApiKey();
    }

    /**
     * Checks if the Api Key is still valid
     */
    private function validateApiKey()
    {
        $url = $this->baseUrl.'isValidApiKey.json';
        $post = array(
            'apiKey' => $this->token
        );

        $result = $this->request($url, $post);

        // check if we got true as result
        if(!isset($result->result) && $result->result == 1)
        {
            die('API KEY is invalid');
        }
    }

    /**
     * Executes a curl request with the provided data
     *
     * @param string $url
     * @param array $post
     * @return array JSON OBJECT
     */
    private function request($url, $post)
    {
        // open connection
        $ch = curl_init();

        // the right header
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        // url
        curl_setopt($ch,CURLOPT_URL, $url);
        // number of  POST vars
        curl_setopt($ch,CURLOPT_POST, 1);
        // POST data
        curl_setopt($ch,CURLOPT_POSTFIELDS, json_encode($post));
        // prevent raw output
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        // get the result
        $result = curl_exec($ch);

        // close connection
        curl_close($ch);

        $result = json_decode($result);

        return $result;
    }
}