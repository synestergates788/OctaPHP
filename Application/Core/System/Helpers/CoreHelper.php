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

        return $base_url._uriString($uri);
    }
}

if(!function_exists(__NAMESPACE__ . '\_uriString')) {
    function _uriString($uri){
        is_array($uri) && $uri = implode('/', $uri);
        return ltrim($uri, '/');
    }
}