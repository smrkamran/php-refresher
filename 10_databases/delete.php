<?php
$pdo = require "db.php";

if (isset($_GET['id'])) {
    $contactid = $_GET['id'];
    $selStmt = $pdo->prepare("SELECT image from contacts WHERE id = :id");
    $selStmt->execute([':id' => $contactid]);
    $contact = $selStmt->fetch(PDO::FETCH_ASSOC);
    if ($contact && $contact['image']) {
        $imgPath = $contact['image'];
        if (file_exists($imgPath)) {
            unlink($imgPath);
        }
    }

    $stmt = $pdo->prepare("DELETE FROM contacts WHERE id = :id");
    $stmt->execute([':id' => $contactid]);


    echo "Contact deleted successfully.";

}