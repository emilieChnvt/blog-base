<?php

$title = null;
$content =null;

$host = "127.0.0.1";
$dbName = "blog-base";
$user = "blogBase";
$password = "blogBase";


if(!empty($_POST['title']) && !empty($_POST['content'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
}

if($title && $content) {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );
    $query = $pdo->prepare("INSERT INTO artciles (title, content) VALUES (:title, :content)");
    $query ->execute([
        "title" => $title,
        "content" => $content
    ]);


}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <form action="newArticle.php" method="POST" class="form form-controlled">
        <h3>Add an artcile</h3>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">content</label>
            <input type="text" class="form-control" name="content" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

</body>
</html>
