<?php

class Signup extends Dbh
{
    private $username;
    private $password;
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    private function insertUser()
    {
        $sql = "INSERT INTO {$this->dbname}.users (username, password) VALUES (:username, :password)";
        $stmt = parent::connect()->prepare($sql);
        $stmt->execute([
            ':username' => $this->username,
            ':password' => $this->password
        ]);
    }

    private function isEmptySubmit()
    {
        if (isset($this->username) && isset($this->password)) {
            return false;
        }
        return true;
    }

    public function signupUser()
    {
        if ($this->isEmptySubmit()) {
            header("Location: " . $_SERVER["DOCUMENT_ROOT"] . "/index.php");
            die();
        }

        $this->insertUser();
    }
}