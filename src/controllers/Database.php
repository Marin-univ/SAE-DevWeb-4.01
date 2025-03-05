<?php
namespace src\controllers;

use PDO;
use PDOException;

class Database {
    private static $connection = null;
    private static $connectionMysql = null;

    public static function getConnection() {
        $password = 't4heVMUqWKuYD2D7'; 
        $host = "aws-0-eu-west-3.pooler.supabase.com";
        $port = "6543";
        $dbname = "postgres";
        $user = "postgres.ypnakqgcqnzjbrekfrfl";

        if (self::$connection === null) {
            try {
                $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
                self::$connection = new PDO($dsn, $user, $password);
            } catch (PDOException $e) {
                die("Erreur de connexion à la base de données : " . $e->getMessage());
            }
        }

        return self::$connection;
    }

    public static function getMysqlConnection()
    {
        if (self::$connectionMysql === null) {
            try {
                self::$connectionMysql = new \PDO('mysql:host=servinfo-maria;dbname=DBmchesneau', 'mchesneau', 'mchesneau');
                self::$connectionMysql->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                error_log("\n\n" . 'Erreur de connexion : ' . $e->getMessage());
                die('Erreur de connexion à la base de données.');
            }
        }
        return self::$connectionMysql;
    }

}