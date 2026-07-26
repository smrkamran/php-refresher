<?php

class Repository
{

public function __construct(private Database $database){

}
    public function getAll(): array
    {
        $pdo = $this->database->getConnection();

        $stmnt = $pdo->query("SELECT * FROM product");

        return $stmnt->fetchAll(PDO::FETCH_ASSOC);
    }

}