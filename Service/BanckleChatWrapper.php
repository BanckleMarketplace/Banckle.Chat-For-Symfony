<?php

namespace Banckle\ChatBundle\Service;

class BanckleChatWrapper
{
    private $APIClient = 'APIClient';
    private $AuthApi = 'AuthApi';
    private $SessionApi = 'SessionApi';
    private $apiKey = '';
    private $banckleAccountUri = '';
    private $banckleChatUri = '';
	
    public function __construct($apiKey ,$banckleAccountUri, $banckleChatUri)
    {
        $this->apiKey = $apiKey;
        $this->banckleAccountUri = $banckleAccountUri;
        $this->banckleChatUri = $banckleChatUri;
    }
	
    /*
    * Generate new authentication token.
    *
    * @return string Returns the token.
    */
    public function getToken($email, $password)
    {
        if ($email == '') {
            throw new \InvalidArgumentException('Email not specified');
    	}
        
        if ($password == '') {
            throw new \InvalidArgumentException('Password not specified');
    	}
        
        $apiClient = new $this->APIClient($this->apiKey, $this->banckleAccountUri);
        $body = array('userEmail' => $email, 'password' => $password);
        $auth = new $this->AuthApi($apiClient);
        $result = $auth->getToken($body);
        $token = $result->authorization->token;
        return $token;
    }
	
    /*
    * Create session resource.
    *
    * @param object $apiClient Object of the APIClient class.
    * @param string $token Token.
    *
    * @return void
    */
    private function createSession($apiClient, $token)
    {
        $session = new $this->SessionApi($apiClient);
        $result = $session->createSession($token);
        $resource = $result->return->resource;
        
        // Set session resource
        $className = 'Product';
        $className::$xResource = $resource;
    }
	
    /*
    * Create an instance of the class.
    *
    * @param string $apiName Name of the class.
    * @param string $token Token.
    *
    * @return object
    * @throws Exception
    */
    public function createInstance($apiName, $token)
    {	
        if ($apiName == '') {
            throw new \InvalidArgumentException('API Name not specified');
    	}
        
        if ($token == '') {
            throw new \InvalidArgumentException('Token not specified');
    	}
        
        $apiClient = new $this->APIClient($this->apiKey, $this->banckleChatUri);
        $this->createSession($apiClient, $token);
        return new $apiName($apiClient);
    }
	
}