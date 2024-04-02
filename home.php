<?php

function uuid4() {
    $id = bin2hex(random_bytes(18));

    $id[8] = "-";
    $id[13] = "-";
    $id[18] = "-";
    $id[23] = "-";
    $id[14] = "4";
    $id[19] = ["8", "9", "a", "b"][random_int(0, 3)];

    return $id;
};

$posts = [
 [
    'id' => uuid4(),
    'title' => 'The Road Ahead',
    'subtitle' => 'The road ahead might be paved - it might not be.',
    'image_src' => '/static/images/northern-lights.png',
    'image_alt' => 'Северное сияние',  
    'author_name' => 'Mat Vogels', 
    'author_avatar' => '/static/images/mat-vogels.jpg',    
    'post_date' => 1443176990,
    'link' => '/post.php',
    'label' => false,
 ],
 [
    'id' => uuid4(),
    'title' => 'From Top Down',
    'subtitle' => 'Once a year, go someplace you ve never been before.',
    'image_src' => '/static/images/sky-lanterns.png', 
    'image_alt' => 'Небесные фонарики',    
    'author_name' => 'William Wong', 
    'author_avatar' => '/static/images/william-wong.jpg',    
    'post_date' => 1443176990,
    'link' => '/',
    'label' => true,
 ],
];
   
//Most Recent
$articles = [
[
    'id' => uuid4(),
    'article_image_src' => '/static/images/air-ballons.png',
    'article_image-alt' => 'Воздушные шары',
    'article_title' => 'Still Standing Tall',
    'article_subtitle' => 'Life begins at the end of your comfort zone.',
    'article_author-name' => 'William Wong',
    'article_author-avatar' => '/static/images/william-wong.jpg',
    'article_date' => 1443176990,
    'link' => '/',
],
[
    'id' => uuid4(),
    'article_image_src' => '/static/images/bridge.png',
    'article_image-alt' => 'Мост',
    'article_title' => 'Sunny Side Up',
    'article_subtitle' => 'No place is ever as bad as they tell you it\'s going to be.',
    'article_author-name' => 'Mat Vogels',
    'article_author-avatar' => '/static/images/mat-vogels.jpg',
    'article_date' => 1443176990,
    'link' => '/',
],
[
    'id' => uuid4(),
    'article_image_src' => '/static/images/lake.png',
    'article_image-alt' => 'Озеро',
    'article_title' => 'Water Falls',
    'article_subtitle' => 'We travel not to escape life, but for life not to escape us.',
    'article_author-name' => 'Mat Vogels',
    'article_author-avatar' => '/static/images/mat-vogels.jpg',
    'article_date' => 1443176990,
    'link' => '/',
],
[
    'id' => uuid4(),
    'article_image_src' => '/static/images/water.png',
    'article_image-alt' => 'Вода',
    'article_title' => 'Through the Mist',
    'article_subtitle' => 'Travel makes you see what a tiny place you occupy in the world.',
    'article_author-name' => 'William Wong',
    'article_author-avatar' => '/static/images/william-wong.jpg',
    'article_date' => 1443176990,
    'link' => '/',
],
[
    'id' => uuid4(),
    'article_image_src' => '/static/images/fog.png',
    'article_image-alt' => 'Туман',
    'article_title' => 'Awaken Early',
    'article_subtitle' => 'Not all those who wander are lost.',
    'article_author-name' => 'Mat Vogels',
    'article_author-avatar' => '/static/images/mat-vogels.jpg',
    'article_date' => 1443176990,
    'link' => '/',
],
[
    'id' => uuid4(),
    'article_image_src' => '/static/images/waterfall.png',
    'article_image-alt' => 'Туман',
    'article_title' => 'Try it Always',
    'article_subtitle' => 'The world is a book, and those who do not travel read only one page.',
    'article_author-name' => 'Mat Vogels',
    'article_author-avatar' => '/static/images/mat-vogels.jpg',
    'article_date' => 1443176990,
    'link' => '/',
],
];
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
                            include 'post_preview.php';
                        }
                    ?>
                </div>
            </section>
            <section class="most-recent">
                <h2 class="section-title">Most Recent</h2>                
                <div class="articles__most-recent">
                    <?php 
                        foreach ($articles as $article) {
                            include 'article_preview.php';
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