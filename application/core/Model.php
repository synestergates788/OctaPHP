<?php
use system\database\connection\pdo_connection;
use system\database\active_record\active_record;

class Model{
    protected $octa;
    protected $bean;

    public function __construct(){

        /*$this->initialize_database();
        $this->bean = $this->bean();
        $this->octa = $this->octa();*/

        /*include_once ROOT.DS.'application'.DS.'core'.DS.'system'.DS.'database'.DS.'connection'.DS.'pdo_connection.php';
        $this->conn = new pdo_connection();
        $this->conn->connect();
        $this->octa = $this->octa();
        $this->bean = $this->bean();*/

        #$this->initialize_database();
        #$this->bean = $this->bean();

        /*if(DB['database_adapter'] == "PDO"){
            $this->pdo = new pdo_connection();
            $this->pdo->connect();
            $this->octa = new pdo_active_record(DB,$this->bean());
        }*/

        $this->initialize_database();
        $this->bean = $this->bean();

        if(DB['driver'] == "MariaDB" || DB['driver'] == "MySQL"){
            $db_host = DB['hostname'];
            $db_username = DB['username'];
            $db_password = DB['password'];
            $db_name = DB['database_name'];

            if(!$this->bean->testConnection()) {
                $this->bean->setup('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
            }
            $this->octa = new active_record($this->bean);
        }

        if(DB['driver'] == "PDO"){
            $this->conn = new pdo_connection();
            $this->conn = $this->conn->connect();
            if(!$this->bean->testConnection()){
                $this->bean->setup($this->conn);
            }
            $this->octa = new active_record($this->bean);

        }

        if(DB['driver'] == "PostgreSQL"){
            $db_host = DB['hostname'];
            $db_username = DB['username'];
            $db_password = DB['password'];
            $db_name = DB['database_name'];
            if(!$this->bean->testConnection()) {
                $this->bean->setup('pgsql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
            }
            $this->octa = new active_record($this->bean);
        }

        if(DB['driver'] == "CUBRID"){
            $db_host = DB['hostname'];
            $db_username = DB['username'];
            $db_password = DB['password'];
            $db_name = DB['database_name'];
            $db_port = DB['port'];
            if(!$this->bean->testConnection()) {
                $this->bean->setup('cubrid:host='.$db_host.';port='.$db_port.';dbname='.$db_name, $db_username, $db_password);
            }
            $this->octa = new active_record($this->bean);
        }

        if(DB['driver'] == "SQLite"){
            $sqlite_database_directory = DB['sqlite_database_directory'];
            if(!$this->bean->testConnection()) {
                $this->bean->setup('sqlite:'.$sqlite_database_directory);
            }
            $this->octa = new active_record($this->bean);
        }
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
}