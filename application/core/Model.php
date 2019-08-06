<?php

class Model{
    protected $octa;
    protected $bean;

    public function __construct(){

        $this->initialize_database();
        $this->bean = $this->bean();
        $this->octa = $this->octa();
    }

    /**
     * initializing database connection.
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function initialize_database(){
        include_once ROOT.DS.'application'.DS.'core'.DS.'system'.DS.'database'.DS.'octa_redbean.php';
        include_once ROOT.DS.'application'.DS.'core'.DS.'system'.DS.'database'.DS.'redbean.php';
    }

    /**
     * autoload redbean.
     * @return R class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function bean(){
        return new R();
    }

    /**
     * autoload octa_redbean+redbean active record.
     * @return octa_redbean class
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function octa(){
        return new octa_redbean(DB,$this->bean());
    }
}