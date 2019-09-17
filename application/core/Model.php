<?php
use system\database\active_record;
use Zend\Config\Config as OctaConfig;
use system\database\connection as OctaDatabase;

class Model{
    protected $octa;
    protected $bean;
    protected $config;

    public function __construct(){

        $this->config = $this->config($GLOBALS['config']);
        $this->initialize_database();
        $this->bean = $this->bean();

        /**
         * connect to database.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $database = new OctaDatabase($this->bean, $this->config);
        $database->connect();
        $this->octa = new active_record($this->bean);
    }

    /**
     * initializing database connection.
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    public function initialize_database(){
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

    public function config(array $array, $allowModifications = false){
        return new OctaConfig($array, $allowModifications);
    }
}