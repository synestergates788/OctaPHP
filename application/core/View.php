<?php

class View{

    protected $view;
    protected $data;
    protected $template;

    public function __construct($view_file,$view_data,$template){
        $this->view = $view_file;
        $this->data = $view_data;
        $this->template = $template;
    }

    public function render(){
        if(file_exists(VIEWS.$this->view.'.php')){
            include_once VIEWS.$this->view.'.php';
        }
    }

    public function getActions(){
        return (explode('//',$this->view));
    }
}