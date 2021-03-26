<?php
namespace CompanyApp;
use PDO;
//statinis su self, paprastas su this
class DB {
    private static string $connection='mysql:host=127.0.0.1';
    private static string $user="root";
    private static string $password="54518s";
    private static string $database="company";
    private static array $options=[
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING
    ];
    public static function connect(): PDO
    {
        try{
            return new PDO(
                self::$connection.';dbname='.self::$database,
                self::$user,
                self::$password,
                self::$options
            );
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}