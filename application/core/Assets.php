<?php

class Assets{

    public function __construct($view,$assets_config){
        $this->allocate_assets($view,$assets_config);
    }

    protected function allocate_assets($view,$assets_config){
        if($assets_config){
            foreach($assets_config as $key=>$row){
                $GLOBALS['asset_row'] = $row;
                $view->addFunction(new \Twig_SimpleFunction($key, function ($asset) {
                    return sprintf($GLOBALS['asset_row'].DS.'%s', ltrim($asset, '/'));
                }));
            }
        }
    }
}