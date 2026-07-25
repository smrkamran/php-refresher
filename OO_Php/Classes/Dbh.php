<?php

class Dbh
{
    private $host = "localhost";
    private $port = 3306;
    protected $dbname = "myfirstdb";
    private $dbuser = "root";
    private $dbpassword = "admin";

    protected function connect()
    {
        try {
            $dsn = "mysql:host=$this->host;port=$this->port;charset=utf8mb4";
            $pdo = new PDO($dsn, $this->dbuser, $this->dbpassword);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = "CREATE DATABASE IF NOT EXISTS `$this->dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;";
            $pdo->exec($sql);

            $pdo->exec("USE `$this->dbname`");

            $pdo->exec("CREATE TABLE IF NOT EXISTS `users` (
                `id` INT AUTO_INCREMENT PRIMARY KEY,
                `username` VARCHAR(255) NOT NULL,
                `password` VARCHAR(255) NOT NULL
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;");

            return $pdo;
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}