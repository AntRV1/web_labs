<?php
$postId = $_GET['id'];

include 'database_function.php';

$row = getPostByID();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/styles/post.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="./sripts/post.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen&display=swap" rel="stylesheet">
    <title><?= $row['title'] ?> id=<?= $postId ?></title>
</head>

<body class="body"> 
    <?php
        include 'header.php';
    ?>    
    <main>       
        <div class="main_title_block container">
            <h1 class="main_title"><?= $row['title'] ?></h1>
            <p class="main_subtitle"><?= $row['subtitle'] ?></p>
        </div>
        <img class="main_image" src="<?= $row['image_src'] ?>" alt="<?= $row['image_alt'] ?>">
        <div class="main_text">
            <div class="main_content container">
                <?php 
                    $texts = explode("<br>", $row['content']);
                ?>
                <?php foreach ($texts as $text): ?>
                    <p class = text><?= $text ?></p>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <?php
        include 'footer.php';
    ?>    
</body>

</html>
