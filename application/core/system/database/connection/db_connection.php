<?php
namespace system\database\connection;
use \PDO;

class db_connection{

    protected $bean;
    protected $config;

    public function __construct($bean,$config){
        $this->bean = $bean;
        $this->config = $config;
    }

    public function connect(){
        $db_host = $this->config->database->hostname;
        $db_username = $this->config->database->username;
        $db_password = $this->config->database->password;
        $db_name = $this->config->database->database_name;
        $db_port = $this->config->database->port;
        $sqlite_database_directory = $this->config->database->sqlite_database_directory;

        if($this->config->database->driver == "MariaDB" || $this->config->database->driver == "MySQL"){
            if(!$this->bean->testConnection()) {
                $this->bean->setup('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
            }
        }

        if($this->config->database->driver == "PDO"){
            if(!$this->bean->testConnection()) {
                $db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
                $this->bean->setup($db);
            }
        }

        if($this->config->database->driver == "PostgreSQL"){
            if(!$this->bean->testConnection()) {
                $this->bean->setup('pgsql:host=' . $db_host . ';dbname=' . $db_name, $db_username, $db_password);
            }
        }

        if($this->config->database->driver == "CUBRID"){
            if(!$this->bean->testConnection()) {
                $this->bean->setup('cubrid:host='.$db_host.';port='.$db_port.';dbname='.$db_name, $db_username, $db_password);
            }
        }

        if($this->config->database->driver == "SQLite"){
            if(!$this->bean->testConnection()) {
                $this->bean->setup('sqlite:'.$sqlite_database_directory);
            }
        }
    }
}