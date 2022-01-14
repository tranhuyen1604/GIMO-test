<?php

namespace App\Services\Database;

use App\Services\Config\Config;
use PDO;
use PDOException;

class DB {
    // DB Params
    private $host;
    private $dbName;
    private $user;
    private $pass;
    private $connection;

    public function __construct()
    {
        $this->connection = null;
        $this->host     = Config::get('database.host');
        $this->user     = Config::get('database.user');
        $this->pass     = Config::get('database.pass');
        $this->dbName   = Config::get('database.db_name');
        $this->options  = Config::get('database.options');

        try { 
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->dbName}",
                $this->user,
                $this->pass,
                $this->options
            );
        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }
    }
    
    /**
     * connect Database
     *
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connection;
    }
}