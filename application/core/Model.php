<?php

class Model{

    protected $octa;
    protected $bean;

    public function __construct(){
        $this->bean = new R();
        $this->octa = new octa_redbean(DB,$this->bean);
    }
}