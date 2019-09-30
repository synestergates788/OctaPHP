<?php
if(!function_exists(__NAMESPACE__ . '\baseUrl')) {
    function baseUrl($uri = '', $protocol = NULL){
        $base_url = baseUrl;

        if (isset($protocol)){
            if($protocol === '') {
                $base_url = substr($base_url, strpos($base_url, '//'));
            }else{
                $base_url = $protocol.substr($base_url, strpos($base_url, '://'));
            }
        }

        return $base_url.DS._uriString($uri);
    }
}

if(!function_exists(__NAMESPACE__ . '\_uriString')) {
    function _uriString($uri){
        is_array($uri) && $uri = implode('/', $uri);
        return ltrim($uri, '/');
    }
}

if ( ! function_exists('redirect'))
{
    function redirect($uri = '', $method = 'location', $http_response_code = 302)
    {
        if ( ! preg_match('#^https?://#i', $uri))
        {
            $uri = baseUrl($uri);
        }

        switch($method)
        {
            case 'refresh'	: header("Refresh:0;url=".$uri);
                break;
            default			: header("Location: ".$uri, TRUE, $http_response_code);
                break;
        }
        exit;
    }
}