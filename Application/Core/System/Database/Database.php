<?php
namespace System\Database;
use \PDO;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;
use RedBeanPHP\Facade as R;

class Database {

    protected $bean;
    protected $config;
    protected $driver;
    protected $host;
    protected $username;
    protected $password;
    protected $database;
    protected $port;
    protected $sqlite_database;

    public function __construct($config) {
        $this->initializeDatabase();
        $this->bean = $this->bean();
        $this->config = $config;
        $this->driver = $this->config->Database->driver;
        $this->host = $this->config->Database->hostname;
        $this->username = $this->config->Database->username;
        $this->password = $this->config->Database->password;
        $this->database = $this->config->Database->database;
        $this->port = $this->config->Database->port;
        $this->sqlite_database = $this->config->Database->sqlite_database_directory;
    }

    public function initializeDatabase() {
        include_once ROOT . DS . 'application' . DS . 'core' . DS . 'system' . DS . 'database' . DS . 'redbean.php';
    }

    public function bean() {
        return new R();
    }

    protected function createDatabase() {
        if ($this->database !== "" || $this->database !== null) {
            if ($this->driver == "MariaDB" || $this->driver == "MySQL") {

                $link = mysqli_connect($this->host, $this->username, $this->password);
                $database = mysqli_select_db($link, $this->database);

                if (!$database) {
                    $sql = "CREATE DATABASE {$this->database};";
                    if (!mysqli_query($link, $sql)) {
                        echo 'Error creating database: ' . mysqli_error($link);
                    }
                }

                mysqli_close($link);
            }

            if ($this->driver == "PDO") {
                $pdo = new PDO("mysql:host=" . $this->host, $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->database};");
                $pdo = null;
            }

            if ($this->driver == "PostgreSQL") {
                $pdo = new PDO("pgsql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->database};");
                $pdo = null;
            }

            if ($this->driver == "CUBRID") {
                $pdo = new PDO('cubrid:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->database, $this->username, $this->password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->exec("CREATE DATABASE IF NOT EXISTS {$this->database};");
                $pdo = null;
            }
        }
    }

    public function connect() {
        if ($this->database !== "" || $this->database !== null) {
            if ($this->driver == "MariaDB" || $this->driver == "MySQL"){
                if (!$this->bean->testConnection()) {
                    $this->createDatabase();
                    $this->bean->setup('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
                }
            }

            if ($this->driver == "PDO") {
                if (!$this->bean->testConnection()) {
                    $this->createDatabase();
                    $db = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
                    $this->bean->setup($db);
                }
            }

            if ($this->driver == "PostgreSQL") {
                if (!$this->bean->testConnection()) {
                    $this->createDatabase();
                    $this->bean->setup('pgsql:host=' . $this->host . ';dbname=' . $this->database, $this->username, $this->password);
                }
            }

            if ($this->driver == "CUBRID") {
                if (!$this->bean->testConnection()) {
                    $this->createDatabase();
                    $this->bean->setup('cubrid:host=' . $this->host . ';port=' . $this->port . ';dbname=' . $this->database, $this->username, $this->password);
                }
            }

            if ($this->driver == "SQLite") {
                if (!$this->bean->testConnection()) {
                    $this->bean->setup('sqlite:' . $this->sqlite_database);
                }
            }
        }
    }
}