<?php

class Database
{
    // private string $host = "127.0.0.1";
    // private string $name = "product_db";
    // private string $user = "product_db_user";
    // private string $password = "secret";

    public function __construct(private string $host, private string $name, private string $user, private string $password)
    {

    }
    public function getConnection(): PDO
    {
        $dsn = "mysql:host={$this->host};dbname={$this->name}";
        return new PDO($dsn, $this->user, $this->password);
    }
}