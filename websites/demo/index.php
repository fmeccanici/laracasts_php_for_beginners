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
                "author" => "Philip K. Dick",
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

        function filter($items, $fn) {
            $filteredItems = [];
            foreach ($items as $item) {
                if ($fn($item)) {
                    $filteredItems[] = $item;
                };
            }
            return $filteredItems;
        };

        $filteredItems = array_filter($books, function ($book) {
            return $book['releaseYear'] >= 1968;
        });
    ?>
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