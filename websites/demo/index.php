<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Demo</title>
</head>
<body>
    <h1>Recommended Books</h1>

    <?php
        $books = [
            [
                "name" => "Do Androids Dream of Electric Sheep",
                "author" => "Philip K.Dick",
                'releaseYear' => 1968,
                "purchaseUrl" => 'http://example.com'
            ],
            [
                "name" => "Project Hail Mary",
                "author" => "Andy Weir",
                'releaseYear' => 2021,
                "purchaseUrl" => 'http://example.com'
            ],
            [
                "name" => "The Martian",
                "author" => "Andy Weir",
                'releaseYear' => 2011,
                "purchaseUrl" => 'http://example.com'
            ],
        ];

        $author = 'Andy Weir';

        function filterByAuthor($books, $author) {
            $filteredBooks = [];
            foreach ($books as $book) {
                if ($book['author'] === $author) {
                    $filteredBooks[] = $book;
                };
            }
            return $filteredBooks;
        }
    ?>
    <ul>
        <?php foreach (filterByAuthor($books, $author) as $book) :?>
        <?php if ($book['author'] === 'Andy Weir') :?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>">
                    <?= $book['name'] ?> (<?= $book['releaseYear'] ?>) - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>
</html>