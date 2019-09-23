<?php

class View{

    protected $View;
    protected $Data;
    protected $Template;

    public function __construct($ViewFile,$ViewData,$Template){
        $this->View = $ViewFile;
        $this->Data = $ViewData;
        $this->Template = $Template;
    }

    public function render(){
        if(file_exists(VIEWS.$this->View.'.php')){
            include_once VIEWS.$this->View.'.php';
        }
    }

    public function getActions(){
        return (explode('//',$this->View));
    }
}