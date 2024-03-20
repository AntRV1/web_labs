<?php
$posts = [
 [
    'id' => 1,
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
   // свойства второго поста
    'id' => 2,
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
    'id' => 3,
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
    'id' => 4,
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
    'id' => 5,
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
    'id' => 6,
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
    'id' => 7,
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
    'id' => 8,
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
        <header class="header">
            <div class="container running-title">
                <a class="logo" href="/home">Escape.</a>
                <nav class="navigation">
                    <ul class="navigation__list">
                        <li class="navigation__item"><a class="navigation__link" href="/home">HOME</a></li>
                        <li class="navigation__item"><a class="navigation__link" href="/">CATEGORIES</a></li>
                        <li class="navigation__item"><a class="navigation__link" href="/">ABOUT</a></li>
                        <li class="navigation__item"><a class="navigation__link" href="/">CONTACT</a></li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="about-the-blog container">
            <h1 class="about-the-blog__title">Let's do it together.</h1>
            <p class="about-the-blog__subtitle">We travel the world in search of stories. Come along for the ride.</p>  
            <a class="button" href="/">View Latest Posts</a>  
        </div>
    </div>
    <nav class="menu">
        <ul class="menu__list container">
            <li class="menu__item"><a class="menu__link" href="/">Nature</a></li>
            <li class="menu__item"><a class="menu__link" href="/">Photography</a></li>
            <li class="menu__item"><a class="menu__link" href="/">Relaxation</a></li>
            <li class="menu__item"><a class="menu__link" href="/">Vacation</a></li>
            <li class="menu__item"><a class="menu__link" href="/">Travel</a></li>
            <li class="menu__item"><a class="menu__link" href="/">Adventure</a></li>
        </ul>
    </nav>    
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
    <footer class="footer">
        <div class="container running-title">
            <a class="logo" href="/home">Escape.</a>
            <nav class="navigation">
                <ul class="navigation__list">
                    <li class="navigation__item"><a class="navigation__link navigation__link_light" href="/home">HOME</a></li>
                    <li class="navigation__item"><a class="navigation__link navigation__link_light" href="/">CATEGORIES</a></li>
                    <li class="navigation__item"><a class="navigation__link navigation__link_light" href="/">ABOUT</a></li>
                    <li class="navigation__item"><a class="navigation__link navigation__link_light" href="/">CONTACT</a></li>
                </ul>
            </nav>
        </div>
    </footer>     
</body>

</html>