<?php

class Assets{

    public function __construct($View, $AssetsConfig) {
        $this->allocateAssets($View, $AssetsConfig);
    }

    protected function allocateAssets($View, $AssetsConfig){
        if ($AssetsConfig) {
            foreach ($AssetsConfig as $key => $row) {
                $GLOBALS['AssetRow'] = $row;
                $View->addFunction(new \Twig\TwigFunction($key, function ($asset) {
                    return sprintf($GLOBALS['AssetRow'] . DS . '%s', ltrim($asset, '/'));
                }));
            }
        }
    }
}