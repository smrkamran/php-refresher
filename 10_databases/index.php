<?php
$pdo = require "db.php";
$contacts = [];
if ($pdo) {
    $stmt = $pdo->query("SELECT * FROM contacts");
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="create.php">Create new contact</a>

    <ul>
        <?php foreach ($contacts as $contact): ?>
            <li>
                <h3>
                    <?php echo htmlspecialchars($contact["name"], ENT_QUOTES, 'UTF-8'); ?>
                    <a href="delete.php?id=<?php echo $contact['id']; ?>">Delete</a>
                </h3>
                <p>Email:
                    <?php echo htmlspecialchars($contact["email"], ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <p>Phone:
                    <?php echo htmlspecialchars($contact["phone"], ENT_QUOTES, 'UTF-8'); ?>
                </p>
                <?php if (isset($contact["image"])): ?>
                    <img src="<?php echo htmlspecialchars($contact["image"], ENT_QUOTES, 'UTF-8'); ?>" alt="Contact Image"
                        width="100">
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>