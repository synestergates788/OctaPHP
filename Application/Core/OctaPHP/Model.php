<?php
namespace OctaPHP;
use OctaPHP\Traits\Model\CoreModel;
use System\Database\Database;
use System\Database\ActiveRecord;
use OctaPHP\Traits\Controller\CoreController;
use RedBean_SimpleModel;

class Model extends RedBean_SimpleModel{
    use CoreModel,
        CoreController {
        CoreModel::__construct as public __OctaCoreModelConstruct;
    }

    protected $config;

    public function __construct()
    {
        $this->__OctaCoreModelConstruct();
        $this->config = $this->config($GLOBALS['config']);
        $database = new Database($this->config);
        $database->connect();
        $this->bean = $database->bean();
        $this->octa = new ActiveRecord($this->bean);
    }
}