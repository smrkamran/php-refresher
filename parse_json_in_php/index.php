<?php

$contents = file_get_contents("books.json");

try {
    $data = json_decode($contents, flags: JSON_THROW_ON_ERROR);
} catch (JsonException $e) {
    exit($e->getMessage());
}
?>
<!-- // if (json_last_error() !== JSON_ERROR_NONE) { -->
<!-- // echo json_last_error_msg(); -->
<!-- // } -->
<!-- // echo " -->
<!-- <pre>"; -->
<!-- // echo print_r($data); -->
<!-- // echo "</pre>"; -->

<?php foreach ($data as $book): ?>
    <h2><?= $book->title ?> </h2>
    <p>by <?= $book->author->firstname ?>     <?= $book->author->surname ?></p>
    <p><?= implode(", ", $book->categories) ?> </p>
    <table>
        <thead>
            <tr>
                <th>Pages</th>
                <th>Price</th>
                <th>Available</th>
                <th>Language</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $book->pages ?></td>
                <td><?= number_format($book->price, 2) ?></td>
                <td><?= $book->available ? 'yes' : 'no' ?></td>
                <td><?= $book->language ?? 'unknown' ?></td>
            </tr>
        </tbody>
    </table>
<?php endforeach; ?>