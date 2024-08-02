<?php

namespace App;

use PDO;
use PDOException;

class Database {

    private static ?PDO $pdoInstance = null;
    private const DB_SETTINGS_PATH = __DIR__.'/../config/db.ini';

    private function __construct()
    {
    }
    
    public static function getConnection(): PDO
    {
        if(self::$pdoInstance === null){
            try {
                [
                    'DB_HOST'     => $host,
                    'DB_PORT'     => $port,
                    'DB_NAME'     => $name,
                    'DB_CHARSET'  => $charset,
                    'DB_USER'     => $user,
                    'DB_PASSWORD' => $password,
                    'DB_DRIVER'   => $sgbd,
                ] = parse_ini_file(self::DB_SETTINGS_PATH);

                self::$pdoInstance = new PDO(
                    "$sgbd:host=$host;port=$port;
                    charset=$charset;
                    dbname=$name",
                    $user,
                    $password);
            } catch (PDOException $e) {
                die ('Erreur de connexion à la bdd : ' . $e->getMessage()); 
            }
        }
        return self::$pdoInstance;
    }
}

