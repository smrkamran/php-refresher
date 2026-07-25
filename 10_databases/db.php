<?php
try {
    $pdo = new PDO("sqlite:contacts.db");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->exec("CREATE TABLE IF NOT EXISTS contacts (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT NOT NULL,
        email TEXT NOT NULL,
        phone TEXT,
        image TEXT
    )");
    return $pdo;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    return null;
}