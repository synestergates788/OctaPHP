<?php

class Application {
    protected $Session;

    public function __construct($Router, $Routes, $RoutesDir, $Error404) {
        $this->LoadRouter($Router, $Routes, $RoutesDir, $Error404);
    }

    public function LoadRouter($Router, $Routes, $RoutesDir, $Error404) {
        $this->Session = new Routes($Router, $Routes, $RoutesDir, $Error404);
    }

    public function UrlSegment($Segment) {
        $Request = trim($_SERVER['REQUEST_URI'], "/");
        if (!empty($Request)) {
            $Url = explode('/', $Request);

            return (isset($Url[$Segment])) ? $Url[$Segment] : '';
        }
    }
}