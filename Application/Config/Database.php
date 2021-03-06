<?php
/*
 * set your database connection here*/
$config['Database'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'your_database_name',

    /***
     * Note: It is highly recommended to choose your preffered database driver
     * ['MariaDB', 'MySQL', 'PDO', 'PostgreSQL', 'SQLite', 'CUBRID'].
     * Ex: 'driver' => 'PDO'
     ***/
    'driver' => 'PDO',

    /***
     * Note: PORT is required if you are using CUBRID database adapter otherwise leave it null
     ***/
    'port' => '',

    /***
     * Note: Allocate you sqlite-database and leave [hostname, username, password,
     * database_name and port] a null value if you are using sqlite database adapter otherwise leave it null
     * (Ex: 'sqlite_database_directory' => '/tmp/dbfile.db')
     ***/
    'SqliteDatabaseDirectory' => '',
);