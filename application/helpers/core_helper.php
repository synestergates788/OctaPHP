<?php

if(!function_exists('url_segment')){
    function url_segment($segment=null){
        $request = trim($_SERVER['REQUEST_URI'], "/");
        if(!empty($request)) {
            $url = explode('/', $request);
            return ($segment) ? $url[$segment] : print_r($url);
        }
    }
}

if(!function_exists('in_array_foreach_custom')){
    function in_array_foreach_custom($needle, $haystack=array(), $strict = false) {
        $holder = array();

        if($haystack != null){
            foreach ($haystack as $key => $item) {
                if (($strict ? $item === $needle : $item == $needle) || (is_array($item) && $this->in_array_foreach_custom($needle, $item, $strict))) {
                    array_push($holder, (object) $haystack[$key]);
                }
            }
        }

        return ($holder != null) ? (object) $holder : false;
    }
}

if(!function_exists('in_array_foreach_custom2')){
    function in_array_foreach_custom2($key, $value, $haystack = array(), $strict = false) {
        $return = array();
        if($haystack != null){
            foreach ($haystack as $k => $subarray){
                if (isset($subarray[$key]) && ($strict ? $subarray[$key] === $value : $subarray[$key] == $value)) {
                    array_push($return, (object) $subarray);
                }
            }
        }
        return ($return != null) ? (object) $return : false;
    }
}
