<?php
echo "coucou";

$host = "127.0.0.1";
$dbName = "blog-base";
$user = "blogBase";
$password = "blogBase";


$pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);

$query = $pdo ->query("SELECT * FROM artciles");
$articles = $query->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>

<a href="newArticle.php">nouvel article </a>
<?php foreach ($articles as $article): ?>
    <hr>
    <div class="article">
        <h3><?= $article['title'] ?></h3>
        <p><?= $article['content'] ?></p>
        <a href="article.php?id=<?= $article['id'] ?>">Lire</a>
    </div>
    <hr>
<?php endforeach; ?>

</body>
</html>
