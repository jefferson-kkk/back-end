<?php 

class Connection{
    private static $instance = null;
    public static function getInstance(){
        if (!self::$instance) {
            try{
                $host = 'localhost';
                $dbname = 'projetos_bebidas';
                $user = 'root';
                $pass = 'senaisp';

                $dsn = "mysql:host=$host;charset=utf8mb4";
                self::$instance = new PDO($dsn, $user, $pass);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                // cria um banco de dados se não existir (utf8mb4)
                $sqlCreateDb = "CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
                self::$instance->exec($sqlCreateDb);
                self::$instance->exec("USE `$dbname`");
            }catch(PDOException $e){
                die("erro ao conectar ao mysql:" . $e->getMessage());
            }
        }
        return self::$instance;
    }
}