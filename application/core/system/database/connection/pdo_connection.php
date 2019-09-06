<?php
namespace system\database\connection;
use \PDO;

class pdo_connection{

    public function connect(){
        $db_host = DB['hostname'];
        $db_username = DB['username'];
        $db_password = DB['password'];
        $db_name = DB['database_name'];

        $db_conn = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_username,$db_password);
        $db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db_conn->exec("CREATE DATABASE IF NOT EXISTS $db_name;");
        return $db_conn;
    }
}