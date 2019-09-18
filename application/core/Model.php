<?php
use system\database\active_record;
use system\database\connection as OctaDatabase;

use system\model\core\modelCore;
use system\model\modelInterface\modelInterface;

class Model{
    protected $octa;
    protected $bean;
    protected $config;

    public function __construct(){

        /**
         * initializing database component using redbeanPhp.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $core = new modelCore();
        $this->model_dependencies($core, $GLOBALS['config']);

        /**
         * connect to database.
         * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
         */
        $database = new OctaDatabase($this->bean, $this->config);
        $database->connect();
        $this->octa = new active_record($this->bean);
    }

    /**
     * initializing model-core.
     * @param modelInterface|$interface
     * @param array $config
     * @author Melquecedec Catang-catang <melquecedec.catangcatang@outlook.com>
     */
    private function model_dependencies(modelInterface $interface, $config=[]){
        $this->config = $interface->config($config);
        $interface->initialize_database();
        $this->bean = $interface->bean();

    }
}