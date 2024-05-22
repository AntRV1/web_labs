<?php

include 'database_function.php';
$conn = createDBConnection();

$sql = "SELECT * FROM post";
$result = $conn->query($sql);
$posts = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        array_push($posts, $row);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/static/styles/home_style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Oxygen&display=swap" rel="stylesheet">
    <script src="./sripts/home.js"></script>
    <title>Blog home page</title>
</head>

<body class="body">
    <div class="head">    
        <?php                    
            include 'header.php';
            include 'title_blog.php';
        ?>        
    </div>
    <?php
        include 'menu.php';
    ?>    
    <main class="main">
        <div class="container">
            <section class="featured-posts">
                <h2 class="section-title">Featured Posts</h2>                
                <div class="featured-posts__content"> 
                    <?php 
                        foreach ($posts as $post) {
                            if ($post['featured']) {
                                include 'post_preview.php';
                            }
                        }
                    ?>
                </div>
            </section>
            <section class="most-recent">
                <h2 class="section-title">Most Recent</h2>                
                <div class="articles__most-recent">
                    <?php
                        foreach ($posts as $post) {
                            if ($post['most_recent']) {
                                include 'article_preview.php';
                            }
                        }
                    ?>                   
                </div>
            </section>             
        </div>        
    </main>
    <?php
        include 'footer.php'
    ?>
</body>

</html>