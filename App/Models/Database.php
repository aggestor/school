<?php

namespace App\Models;

use Error;
use PDO;

class Database extends PDO
{
    private const USER = "root";
    private const HOST = "localhost";
    private const DATABASE = "tid";
    private const PASSWORD = "";
    // private const USER = "fomibuni_root";
    // private const HOST = "localhost";
    // private const DATABASE = "fomibuni_main";
    // private const PASSWORD = "L5dFsp28cur6DTT";

    static $db;
    /**
     * This is the one and only one database class the talks directly to PDO
     * @return Database
     */
    public static function getInstance()
    {
        if (self::$db == null) {
            $dsn = 'mysql:dbname=' . self::DATABASE . '; host=' . self::HOST;
            try {
                $pdo = new \PDO($dsn, self::USER, self::PASSWORD);
                $pdo->setAttribute(\PDO::MYSQL_ATTR_INIT_COMMAND, 'UTF-8');
                $pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$db = $pdo;
            } catch (\PDOException $e) {
                throw new Error($e->getMessage(), intval($e->getCode()), $e);
            }
        }
        return self::$db;
    }
}