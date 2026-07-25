<?php

$uploadsDir = "uploads/";
$contactsFile = "contacts.json";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_input(INPUT_POST, "name", FILTER_UNSAFE_RAW);
    // echo $name;
    // echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $email = filter_input(INPUT_POST, "email", FILTER_UNSAFE_RAW);
    $phone = filter_input(INPUT_POST, "phone", FILTER_UNSAFE_RAW);

    $image = filter_input(INPUT_POST, "image", FILTER_UNSAFE_RAW);
    echo $image . "<br>";
    echo "<pre>";
    echo var_dump($_FILES) . "<br>";
    echo "</pre>";

    if ($name && $email && $phone && isset($_FILES["image"])) {
        // Ensure upload directory exists
        if (!is_dir($uploadsDir)) {
            mkdir($uploadsDir, 0777, true);
        }

        $imageName = time() . "_" . basename($_FILES["image"]["name"]);
        $imagePath = $uploadsDir . $imageName;

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
            $contacts = file_exists($contactsFile) ? json_decode(file_get_contents($contactsFile)) : [];

            $contacts[] = [
                'id' => rand(100000, 200000),
                "name" => $name,
                "email" => $email,
                "phone" => $phone,
                "image" => $imagePath
            ];

            file_put_contents($contactsFile, json_encode($contacts, JSON_PRETTY_PRINT));

            echo "Image uploaded successfully.<br>";
        } else {
            echo "Failed to upload image.<br>";
        }

        echo "Name: " . htmlspecialchars($name, ENT_QUOTES, 'UTF-8') . "<br>";
        echo "Email: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "<br>";
        echo "Phone: " . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "<br>";
    } else {
        echo "Please fill in all fields.";
    }
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
    <form action="create.php" method="POST" enctype="multipart/form-data">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <label for="phone">Phone:</label>
        <input type="tel" name="phone" id="phone" placeholder="Enter your phone number">

        <label for="image">Image:</label>
        <input type="file" name="image" id="image">
        <button type="submit">Submit</button>
    </form>
</body>

</html>