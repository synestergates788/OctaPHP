<?php
namespace OctaPHP\Traits\Google\Api;
use Google_Service_Books as OctaGoogle_Service_Books;
use Google_Client as OctaGoogle_Client;

trait Api{

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * google-api adapter
     * @param array $config
     * @return OctaGoogle_Client class
     * @author Google Inc.
     */
    public function googleClient(array $config = array()){
        return new OctaGoogle_Client($config);
    }

    /**
     * integrating filesystem abstraction layout of gaufrette.
     * @param null $client
     * @return OctaGoogle_Service_Books class
     * @author Google, Inc.
     */
    public function googleServiceBooks($client=null){
        return new OctaGoogle_Service_Books($client);
    }
}