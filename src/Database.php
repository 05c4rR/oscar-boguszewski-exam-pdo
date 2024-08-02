<?php

namespace App;

use PDO;
use PDOException;
use Symfony\Component\Dotenv\Dotenv;

class Database {

    private static ?PDO $pdoInstance = null;
    private const ENV_FILE_PATH = __DIR__.'/../.env';

    private function __construct()
    {
    }
    
    public static function getConnection(): PDO
    {
        if(self::$pdoInstance === null){
            try {
                $dotenv = new Dotenv();
                $dotenv->loadEnv(self::ENV_FILE_PATH);
                [
                    'DB_DRIVER'   => $sgbd,
                    'DB_HOST'     => $host,
                    'DB_PORT'     => $port,
                    'DB_NAME'     => $name,
                    'DB_CHARSET'  => $charset,
                    'DB_USER'     => $user,
                    'DB_PASSWORD' => $password,
                ] = $_ENV;

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

