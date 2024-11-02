<?php

namespace config\conn;

use Exception;
use PDOException;
use PDO;

class ConexaoMySQL
{

    private const DB_HOST = "localhost";
    private const DB_NAME = "jogos";
    private const DB_USER = "root";
    private const DB_PASSWORD = "";

    private static $connection;

    private function __construct() {}

    public static function getConnection()
    {

        //$pdoConfig = DB_DRIVER . ":";
        $pdoConfig = "mysql:host=" . self::DB_HOST . ";";
        $pdoConfig .= "dbname=" . self::DB_NAME;

        try {

            if (!isset($connection)) {
                $connection = new PDO($pdoConfig, self::DB_USER, self::DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            return $connection;
        } catch (PDOException $e) {
            //$msg = "Drivers disponiveis: " . implode(",", PDO::getAvailableDrivers());
            //$msg .= "\nErro: " . $e->getMessage();
            throw new Exception($e->getMessage());
        }
    }
}
