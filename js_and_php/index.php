<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Data in JS</title>
</head>

<body>

    <script>
        fetch('data.php').then(response => response.json()).then(data => alert(data));
    </script>
</body>

</html>