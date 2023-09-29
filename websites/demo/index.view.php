<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Demo</title>
</head>
<body>
<h1>Recommended Books</h1>
<ul>
    <?php foreach ($filteredItems as $book) :?>
        <li>
            <a href="<?= $book['purchaseUrl'] ?>">
                <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>