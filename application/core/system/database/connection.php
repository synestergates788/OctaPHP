<?php
namespace system\database;
use \PDO;

class connection{

    protected $bean;
    protected $config;

    protected $driver;
    protected $host;
    protected $username;
    protected $password;
    protected $database;
    protected $port;
    protected $sqlite_database;

    public function __construct($bean,$config){
        $this->bean = $bean;
        $this->config = $config;

        $this->driver = $this->config->database->driver;
        $this->host = $this->config->database->hostname;
        $this->username = $this->config->database->username;
        $this->password = $this->config->database->password;
        $this->database = $this->config->database->database_name;
        $this->port = $this->config->database->port;
        $this->sqlite_database = $this->config->database->sqlite_database_directory;
    }

    protected function create_database(){
        if($this->driver == "MariaDB" || $this->driver == "MySQL"){
            $link = mysqli_connect($this->host, $this->username, $this->password);
            $database = mysqli_select_db($link, $this->database);

            if (!$database){
                $sql = "CREATE DATABASE {$this->database};";
                if(!mysqli_query($link, $sql)){
                    echo 'Error creating database: ' . mysqli_error($link);
                }
            }

            mysqli_close($link);
        }

        if($this->driver == "PDO"){
            $pdo = new PDO("mysql:host=".$this->host, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->database};");
            $pdo = null;
        }

        if($this->driver == "PostgreSQL"){
            $pdo = new PDO("pgsql:host=".$this->host.";dbname=".$this->database, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->database};");
            $pdo = null;
        }

        if($this->driver == "CUBRID"){
            $pdo = new PDO('cubrid:host='.$this->host.';port='.$this->port.';dbname='.$this->database, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->database};");
            $pdo = null;
        }
    }

    public function connect(){
        if($this->driver == "MariaDB" || $this->driver == "MySQL"){
            if(!$this->bean->testConnection()) {
                $this->create_database();
                $this->bean->setup('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
            }
        }

        if($this->driver == "PDO"){
            if(!$this->bean->testConnection()) {
                $this->create_database();
                $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
                $this->bean->setup($db);
            }
        }

        if($this->driver == "PostgreSQL"){
            if(!$this->bean->testConnection()) {
                $this->create_database();
                $this->bean->setup('pgsql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
            }
        }

        if($this->driver == "CUBRID"){
            if(!$this->bean->testConnection()) {
                $this->create_database();
                $this->bean->setup('cubrid:host='.$this->host.';port='.$this->port.';dbname='.$this->database, $this->username, $this->password);
            }
        }

        if($this->driver == "SQLite"){
            if(!$this->bean->testConnection()) {
                $this->bean->setup('sqlite:'.$this->sqlite_database);
            }
        }
    }
}